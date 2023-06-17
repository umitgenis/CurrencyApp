<?php

namespace App\Currency;

use App\Models\CurrencySetting;
use Illuminate\Support\Facades\Http;

class CollectProvider implements CurrencyProvider
{

    public function source()
    {
        return CurrencySetting::COLLECT;
    }

    public function getCurrency()
    {
        $response = Http::withHeaders([
            'authorization' => env('API_KEY_COLLECT'),
            'content-type' => 'application/json'
        ])->get('https://api.collectapi.com/economy/allCurrency');
        $data = $response->json(['result']);

        return new Currency($data[0]['buyingstr'], $data[0]['sellingstr'], $data[1]['buyingstr'], $data[1]['sellingstr'], $data[2]['buyingstr'], $data[2]['sellingstr'], $data[0]['date']);
    }
}
