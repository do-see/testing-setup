<?php

namespace Qafoo;

class BasketTest extends \PHPUnit_Framework_TestCase
{
    /*
     * Usage example:
     *
    $basket = new Basket();
    $basket->add(new Product("Harry Potter 1", 3.99));
    $basket->add(new Product("Harry Potter 2", 4.39));
    $basket->add(new Product("Harry Potter 1", 3.99));

    $items = $basket->items();
    // 1 item for "Harry Potter 1" with count 2
    // 1 item for "Harry Potter 2" with count 1
     */

    public function testNewBasketIsEmpty()
    {
        $basket = new Basket();

        $this->assertEquals(array(), $basket->items());
    }
}
