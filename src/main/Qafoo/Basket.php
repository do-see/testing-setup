<?php

namespace Qafoo;

class Basket
{
    private $items = array();

    public function items()
    {
        return $this->items;
    }

    public function add(Product $product)
    {
        $this->items[] = new BasketItem($product);
    }
}
