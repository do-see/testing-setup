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

    private $basket;

    public function setUp()
    {
        $this->basket = new Basket();
    }

    public function testNewBasketIsEmpty()
    {
        $this->assertEquals(array(), $this->basket->items());
    }

    public function testBasketWithSingleProductItem()
    {
        $harryPotter1 = new Product("Harry Potter 1", 3.99);

        $this->basket->add($harryPotter1);

        $items = $this->basket->items();

        $this->assertInternalType('array', $items);
        $this->assertCount(1, $items);

        $this->assertEquals(
            new BasketItem($harryPotter1, 1),
            $items[0]
        );
    }

    public function testBasketWithMultipleUniqueProducts()
    {
        $harryPotter1 = new Product("Harry Potter 1", 3.99);
        $harryPotter2 = new Product("Harry Potter 2", 4.39);

        $this->basket->add($harryPotter1);
        $this->basket->add($harryPotter2);

        $items = $this->basket->items();

        $this->assertEquals(
            new BasketItem($harryPotter1, 1),
            $items[0]
        );
        $this->assertEquals(
            new BasketItem($harryPotter2, 1),
            $items[1]
        );
    }

    public function testBasketWithMultipleNonUniqueProducts()
    {
        $harryPotter1 = new Product("Harry Potter 1", 3.99);

        $this->basket->add(clone $harryPotter1);
        $this->basket->add(clone $harryPotter1);

        $items = $this->basket->items();

        $this->assertCount(1, $items);
        $this->assertEquals(
            new BasketItem($harryPotter1, 2),
            $items[0]
        );
    }
}
