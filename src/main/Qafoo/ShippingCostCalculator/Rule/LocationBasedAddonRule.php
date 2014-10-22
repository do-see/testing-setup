<?php

namespace Qafoo\ShippingCostCalculator\Rule;

use Qafoo\ShippingCostCalculator\Rule;

class LocationBasedAddonRule extends Rule
{
    /**
     * @param Qafoo\ShippingCostCalculator\Rule $innerRule
     * @param array<string> $zipCodes
     * @param float $priceAddon
     */
    public function __construct(Rule $innerRule, array $zipCodes, $priceAddon)
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
