<?php

namespace App\Http\Controllers;

use App\Currency\CurrencyProviderFactory;
use App\Models\Currency;
use Carbon\Carbon;

class CurrencyController extends Controller
{
    public function fetchCurrency()
    {
        $today = Carbon::now()->toDateString();
        $latesCurrency = Currency::whereDate('date', $today)->first();

        $factory = new CurrencyProviderFactory();
        $provider = $factory->getProvider();
        $dto = $provider->getCurrency();

        if ($latesCurrency  && $latesCurrency->source == $provider->source() ) {

            $latesCurrency->usd_buying = $dto->usd_buying;
            $latesCurrency->usd_selling = $dto->usd_selling;
            $latesCurrency->eur_buying = $dto->eur_buying;
            $latesCurrency->eur_selling = $dto->eur_selling;
            $latesCurrency->gbp_buying = $dto->gbp_buying;
            $latesCurrency->gbp_selling = $dto->gbp_selling;
            $latesCurrency->date = $dto->date;
            $latesCurrency->source = $provider->source();

            $insert = $latesCurrency->save();

            if ($insert) {
                echo 'Success. Currency Update. [ ' . strtoupper($provider->source()) . ' ]';
            } else {
                echo 'Error! Currency cannot update.';
            }

        } else {

            $currency = new Currency();
            $currency->usd_buying = $dto->usd_buying;
            $currency->usd_selling = $dto->usd_selling;
            $currency->eur_buying = $dto->eur_buying;
            $currency->eur_selling = $dto->eur_selling;
            $currency->gbp_buying = $dto->gbp_buying;
            $currency->gbp_selling = $dto->gbp_selling;
            $currency->date = $dto->date;
            $currency->source = $provider->source();

            $insert = $currency->save();

            if ($insert) {
                echo 'Success. Currency Added. [ ' . strtoupper($provider->source()) . ' ]';
            } else {
                echo 'Error! Currency cannot add.';
            }
        }
    }

    public function getCurrency()
    {
        $currency = Currency::orderBy('created_at', 'desc')->first();

        if (is_null($currency)) {
            echo 'Error! No Currency';
        } else {
            echo $currency;
        }
    }
}
