<?php

namespace Qafoo;

class Checkout
{
    private $priceMap = array(
        'B' => 23,
        'D' => 42,
    );

    private $currentPrice = 0;

    public function scan($item)
    {
        $this->currentPrice += $this->priceMap[$item];
    }

    public function getSum()
    {
        return $this->currentPrice;
    }
}
