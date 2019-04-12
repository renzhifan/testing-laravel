<?php

namespace Tests\Unit;

use App\Product;
use App\Order;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    /** @test */
    public function testAnOrderSonsistsOfProducts()
    {
        $order = $this->createOrderWithProducts();

        $this->assertCount(2,$order->products());
    }

    /** @test */
    public function testAnOrderCanDetermineTheTotalCostOfAllItsProducts()
    {
        $order = $this->createOrderWithProducts();

        $this->assertEquals(66,$order->total());
    }

    protected function CreateOrderWithProducts()
    {
        $order = new Order;

        $product = new Product('Fallout 4',59);
        $product2 = new Product('Pillowcase',7);

        $order->add($product);
        $order->add($product2);

        return $order;
    }
}
