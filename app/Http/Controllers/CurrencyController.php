<?php

namespace App\Http\Controllers;

use App\Currency\CurrencyProviderFactory;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function getCurrency()
    {
        $factory = new CurrencyProviderFactory();
        $provider = $factory->getProvider();
        $dto = $provider->getCurrency();

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
            echo 'Success. Currency added. [ ' . strtoupper($provider->source()) . ' ]';
        } else {
            echo 'Error! Currency cannot add.';
        }
    }
}
