<?php
/**
 * Created by PhpStorm.
 * User: renzhifan
 * Date: 2019-04-11
 * Time: 16:02
 */
namespace App;

class Product
{
    protected $name;
    protected $price;

    public function __construct($name,$price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function name()
    {
        return $this->name;
    }

    public function price()
    {
        return $this->price;
    }
}