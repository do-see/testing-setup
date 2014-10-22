<?php

namespace Qafoo\ShippingCostCalculator;

use Qafoo\ShippingCostCalculator;

class OverrideShippingCostRule extends Rule
{
    private $innerRule;
    private $conditions;

    public function __construct(Rule $innerRule, array $conditions)
    {
        $this->innerRule = $innerRule;
        $this->conditions = $conditions;
    }

    /**
     * @param Qafoo\ShippingCostCalculator\Checkout $checkout
     * @param Qafoo\ShippingCostCalculator\Address $shippingAddress
     * @return array<Qafoo\ShippingCostCalculator\ShippingOption>
     */
    public function getShippingOptions(Checkout $checkout, Address $shippingAddress);
    {
        $shippingOptions = $this->innerRule->getShippingOptions($checkout, $shippingAddress);

        foreach ($shippingOptions as $option) {
            if ($option->getPrice() <= 3 && $checkout->getPrice() > 50) {
                $option->setPrice(0);
            }
        }

        return $shippingOptions;
    }
}
