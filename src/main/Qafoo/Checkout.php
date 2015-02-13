<?php

namespace Qafoo;

class Checkout
{
    private $sum = 0.0;

    private $itemPriceMap = array(
        'Apple' => 23.42,
        'Banana' => 0.10,
    );

    private $scannedItems = array();

    private $priceLookup;

    public function __construct(PriceLookup $priceLookup)
    {
        $this->priceLookup = $priceLookup;
    }

    public function scan($itemName)
    {
        $this->sum += $this->priceLookup->lookupPrice($itemName);
        $this->scannedItems[] = $itemName;
    }

    public function calculateSum()
    {
        return $this->sum;
    }

    public function listScannedItems()
    {
        return $this->scannedItems;
    }
}
