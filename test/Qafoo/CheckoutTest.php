<?php

namespace Qafoo;

class CheckoutTest extends \PHPUnit_Framework_TestCase
{
    private $checkout;

    private $priceLookupMock;

    public function setUp()
    {
        $this->priceLookupMock = $this->createPriceLookupDouble();
        $this->checkout = new Checkout(
            $this->priceLookupMock
        );
    }

    private function createPriceLookupDouble()
    {
        $priceLookupMock = $this->getMockBuilder('Qafoo\\PriceLookup')
            ->disableOriginalConstructor()
            ->getMock();

        return $priceLookupMock;
    }

    private function hasDefaultPrices($priceLookupMock)
    {
        $priceLookupMock->expects($this->any())
            ->method('lookupPrice')
            ->will(
                $this->returnCallback(
                    function ($itemName) {
                        if ($itemName === 'Apple') {
                            return 23.42;
                        }
                        if ($itemName === 'Banana') {
                            return 0.01;
                        }
                    }
                )
            );
    }

    public function testNoArticlesInCheckoutMeansSumIsZero()
    {
        $this->hasDefaultPrices($this->priceLookupMock);

        $sum = $this->checkout->calculateSum();
        $this->assertSame(0.0, $sum);
    }

    public function testArticleScannedMeansSumGreaterThanZero()
    {
        $this->hasDefaultPrices($this->priceLookupMock);

        $this->checkout->scan('Apple');

        $sum = $this->checkout->calculateSum();
        $this->assertSame(23.42, $sum);
    }

    public function testCanRetrieveListOfAllScannedItems()
    {
        $this->hasDefaultPrices($this->priceLookupMock);

        $this->checkout->scan('Apple');
        $this->checkout->scan('Banana');

        $scannedItemList = $this->checkout->listScannedItems();

        $this->assertSame(
            array('Apple', 'Banana'),
            $scannedItemList
        );
    }

    public function testCheckoutRetrievesMostRecentPrice()
    {
        $this->priceLookupMock->expects($this->once())
            ->method('lookupPrice')
            ->will($this->returnValue(0.13));

        $this->checkout->scan('Apple');

        $this->assertSame(
            0.13,
            $this->checkout->calculateSum()
        );
    }
}
