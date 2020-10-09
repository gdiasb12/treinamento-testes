<?php

namespace App\Shipping;

use App\Shipping\User;
use App\Shipping\ItemCart;
use App\Shipping\Product;

class Cart
{
    private User $user;
    // /** @var array<Product> $itemCart a list of products with the amount */
    private array $itensCart = [];

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setItemCart(Product $product, int $amount = 1)
    {
        for ($count = 1; $count <= $amount; $count++) {
            array_push($this->itensCart, $product);
        }
    }

    public function getItensCart()
    {
        return $this->itensCart;
    }

    public function countItensCart()
    {
        return count($this->itensCart);
    }

    public function removeItemCart($productName, $amount = 1): void
    {
        $itensCart = $this->itensCart;

        for ($count = 1; $count <= $amount; $count++) {
            foreach ($itensCart as $key => $item) {
                if ($productName == $item->getName()) {
                    unset($itensCart[$key]);
                    break;
                }
            }
        }
        
        $this->itensCart = $itensCart;
    }
}
