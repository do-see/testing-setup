<?php

namespace Qafoo;

class Checkout
{
    private $priceMap = array(
        'B' => 23,
        'D' => 42,
    );

    private $currentPrice = 0;

    public function scan($items)
    {
        for ($i = 0; $i < strlen($items); $i++) {
            $this->currentPrice += $this->priceMap[$items[$i]];
        }
    }

    public function getSum()
    {
        return $this->currentPrice;
    }
}
