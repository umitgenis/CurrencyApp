<?php

namespace App\Currency;

interface CurrencyProvider
{
    public function source();

    public function getCurrency();
}
