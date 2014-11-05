<?php

namespace Qafoo\ShippingCostCalculator;

class Checkout
{
    private $items = array();

    public function addItem(CheckoutItem $item)
    {
        $this->items[] = $item;
    }

    /**
     * @return float
     */
    public function getOverallPrice()
    {
        $overallPrice = 0.0;
        foreach ($this->items as $item) {
            $overallPrice += $item->getProduct()->getPrice();
        }
        return $overallPrice;
    }

    /**
     * @return int
     */
    public function getOverallWeight()
    {
    }

    /**
     * @return Qafoo\ShippingCostCalculator\CheckoutItem
     */
    public function getCheckoutItems()
    {
    }
}
