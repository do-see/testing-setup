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
}
