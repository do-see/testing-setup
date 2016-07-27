<?php

namespace Qafoo;

class CheckoutTest extends \PHPUnit_Framework_TestCase
{
    public function testScanSingleItem()
    {
        $checkout = new Checkout();

        $checkout->scan('B');

        $sum = $checkout->getSum();
        $this->assertEquals(23, $sum);
    }

    public function testDifferentSingleItem()
    {
        $checkout = new Checkout();

        $checkout->scan('D');

        $sum = $checkout->getSum();
        $this->assertEquals(42, $sum);
    }

    public function testMultipleScansInSequence()
    {
        $checkout = new Checkout();

        $checkout->scan('B');
        $checkout->scan('D');

        $sum = $checkout->getSum();
        $this->assertEquals(65, $sum);
    }

    public function testScanMultipleItemsAtOnce()
    {
        $checkout = new Checkout();

        $checkout->scan('BDB');

        $sum = $checkout->getSum();
        $this->assertEquals(78, $sum);
    }
}
