<?php

namespace Qafoo;

class XmlRenderer implements BasketRenderer
{
    public function render(Basket $basket)
    {
        $xmlBasket = '<basket>';
        foreach ($basket->items() as $item) {
            $product = $item->getProduct();
            $xmlBasket .= '<item><title>'
                . $product->getTitle()
                . '</title><price>'
                . sprintf('%0.2f', $product->getPrice())
                . '</price><count>'
                . $item->getCount()
                . '</count></item>';
        }
        $xmlBasket .= '</basket>';

        return $xmlBasket;
    }
}
