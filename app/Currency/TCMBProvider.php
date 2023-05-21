<?php

namespace App\Currency;

use App\Models\CurrencySetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class TCMBProvider implements CurrencyProvider
{

    public function source()
    {
        return CurrencySetting::TCMB;
    }

    public function getCurrency()
    {
        $day = Carbon::now()->format('d-m-Y');
        $response = Http::get('https://evds2.tcmb.gov.tr/service/evds/series=TP.DK.USD.A-TP.DK.USD.S-TP.DK.EUR.A-TP.DK.EUR.S-TP.DK.GBP.A-TP.DK.GBP.S&startDate=' . $day . '&endDate=' . $day . '&type=json&key=' . env('API_KEY_TCMB'));
        $data = $response->json('items');

        return new Currency($data[0]['TP_DK_USD_A'], $data[0]['TP_DK_USD_S'], $data[0]['TP_DK_EUR_A'], $data[0]['TP_DK_EUR_S'], $data[0]['TP_DK_GBP_A'], $data[0]['TP_DK_GBP_S'], $data[0]['Tarih']);
    }
}
