<?php

namespace App\Shipping;

use App\Shipping\Product;

class ItemCart
{
    private Product $product;
    private int $amount;

    public function __construct(Product $product, int $amount = 1)
    {
        $this->product = $product;
        $this->amount = $amount;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}
