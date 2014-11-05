<?php

namespace Qafoo\ShippingCostCalculator;

class CheckoutItem
{
    private $product;
    private $count;

    public function __construct(Product $product, $count)
    {
        $this->product = $product;
        $this->count = $count;
    }

    /**
     * @return Qafoo\ShippingCostCalculator\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }
}
