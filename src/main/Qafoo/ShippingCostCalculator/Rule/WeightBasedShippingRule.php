<?php

namespace Qafoo\ShippingCostCalculator\Rule;

use Qafoo\ShippingCostCalculator\Rule;

class WeightBasedShippingRule extends Rule
{
    /**
     * @param int $minWeight
     * @param int $maxWeight
     * @param float $price
     */
    public function __construct($minWeight, $maxWeight, $price)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingOptions(Checkout $checkout, Address $shippingAddress)
    {
        throw new RuntimeException('Not implemented, yet');
    }
}
