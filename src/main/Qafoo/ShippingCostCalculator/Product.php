<?php

namespace Qafoo\ShippingCostCalculator;

class Product
{
    private $weight;
    private $price;

    public function __construct($weight, $price)
    {
        $this->weight = $weight;
        $this->price = $price;
    }

    /**
     * @return int Weight in g
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}
