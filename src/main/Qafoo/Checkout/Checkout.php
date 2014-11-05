<?php

namespace Qafoo\Checkout;

class Checkout
{
    private $overallSum = 0;

    public function getSum()
    {
        return $this->overallSum;
    }

    public function scan(Item $item)
    {
        $this->overallSum += $item->getPrice();
    }
}
