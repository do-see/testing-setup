<?php

namespace Qafoo\ShippingCostCalculator;

class CheckoutTest extends \PHPUnit_Framework_TestCase
{
    public function testGetOverallPriceWithSingleItem()
    {
        $checkout = new Checkout();

        $item = new CheckoutItem(
            new Product(23, 42.23),
            1
        );

        $checkout->addItem($item);

        $this->assertEquals(
            42.23,
            $checkout->getOverallPrice()
        );
    }

    public function testGetOverallPriceWithMultipleItems()
    {
        $checkout = new Checkout();

        $item = new CheckoutItem(
            new Product(23, 42.23),
            1
        );
        $checkout->addItem($item);

        $item = new CheckoutItem(
            new Product(12, 18),
            1
        );
        $checkout->addItem($item);

        $this->assertEquals(
            60.23,
            $checkout->getOverallPrice()
        );
    }
}
