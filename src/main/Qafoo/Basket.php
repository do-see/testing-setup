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
        foreach ($this->items as $item) {
            if ($item->getProduct() == $product) {
                $item->addAmount(1);
                return;
            }
        }
        $this->items[] = new BasketItem($product);
    }
}
