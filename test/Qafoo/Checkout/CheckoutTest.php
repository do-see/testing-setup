<?php

namespace Qafoo\Checkout;

class CheckoutTest extends \PHPUnit_Framework_TestCase
{
    private $checkout;

    public function setUp()
    {
        $this->checkout = new Checkout();
    }

    public function testNoItemsScanned()
    {
        $sum = $this->checkout->getSum();

        $this->assertSame(0, $sum);
    }

    public function testScanSingleItem()
    {
        $this->checkout->scan(new Item(23.42));

        $sum = $this->checkout->getSum();

        $this->assertSame(23.42, $sum);
    }

    public function testScanMultipleItems()
    {
        $this->checkout->scan(new Item(23.42));
        $this->checkout->scan(new Item(5.0));

        $sum = $this->checkout->getSum();

        $this->assertSame(28.42, $sum);
    }
}
