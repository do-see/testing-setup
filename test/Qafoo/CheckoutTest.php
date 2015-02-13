<?php

namespace Qafoo;

class CheckoutTest extends \PHPUnit_Framework_TestCase
{
    private $checkout;

    public function setUp()
    {
        $this->checkout = new Checkout();
    }

    public function testNoArticlesInCheckoutMeansSumIsZero()
    {
        $sum = $this->checkout->calculateSum();
        $this->assertSame(0.0, $sum);
    }

    public function testArticleScannedMeansSumGreaterThanZero()
    {
        $this->checkout->scan('Apple', 23.42);

        $sum = $this->checkout->calculateSum();
        $this->assertSame(23.42, $sum);
    }
}
