<?php

namespace Qafoo;

class Checkout
{
    private $sum = 0.0;

    public function scan($itemName, $itemPrice)
    {
        $this->sum += $itemPrice;
    }

    public function calculateSum()
    {
        return $this->sum;
    }
}
