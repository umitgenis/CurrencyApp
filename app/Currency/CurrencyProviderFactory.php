<?php

namespace App\Currency;

use App\Models\CurrencySetting;

class CurrencyProviderFactory
{
    public function getProvider(): CurrencyProvider
    {
        $set = CurrencySetting::select('source')->first();
        if (empty($set)) {
            $set = new CurrencySetting();
            $set->source = CurrencySetting::TCMB;
            $set->save();
        }

        if ($set->source == CurrencySetting::TCMB) {
            return new TCMBProvider();
        } else {
            return new CollectProvider();
        }
    }
}
