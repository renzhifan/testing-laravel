<?php
/**
 * Created by PhpStorm.
 * User: renzhifan
 * Date: 2019-04-11
 * Time: 16:12
 */

namespace App;


class Order
{
    protected $products = [];
    protected $total = 0;

    public function add(Product $product)
    {
        $this->products[] = $product;
        $this->total += $product->price();
    }

    public function products()
    {
        return $this->products;
    }

    public function total()
    {
        return $this->total;
    }
}