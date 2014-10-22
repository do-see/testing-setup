<?php

namespace Qafoo\ShippingCostCalculator;

abstract class Rule
{
    /**
     * @param Qafoo\ShippingCostCalculator\Checkout $checkout
     * @param Qafoo\ShippingCostCalculator\Address $shippingAddress
     * @return array<Qafoo\ShippingCostCalculator\ShippingOption>
     */
    abstract public function getShippingOptions(Checkout $checkout, Address $shippingAddress);
}
