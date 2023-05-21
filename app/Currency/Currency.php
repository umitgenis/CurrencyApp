<?php

namespace App\Currency;

class Currency
{
    public $usd_buying;
    public $usd_selling;
    public $eur_buying;
    public $eur_selling;
    public $gbp_buying;
    public $gbp_selling;

    public $date;

    public function __construct($usd_buying, $usd_selling, $eur_buying, $eur_selling, $gbp_buying, $gbp_selling, $date)
    {
        $this->usd_buying = $usd_buying;
        $this->usd_selling = $usd_selling;
        $this->eur_buying = $eur_buying;
        $this->eur_selling = $eur_selling;
        $this->gbp_buying = $gbp_buying;
        $this->gbp_selling = $gbp_selling;
        $this->date = $date;
    }
}
