<?php

namespace Qafoo\ShippingCostCalculator\Rule;

use Qafoo\ShippingCostCalculator\Rule;

class ChainSelectShippingRule extends Rule
{
    /**
     * @param array<Qafoo\ShippingCostCalculator\Rule> $ruleChain
     */
    public function __construct(array $ruleChain)
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
