<?php

namespace App\Shipping\Model;

use App\Shipping\Model\User;
use App\Shipping\Model\Product;

class Cart implements CartInterface
{
    private User $user;
    
    private array $itemsCart = [];

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setItemCart(Product $product, int $amount = 1): void
    {
        for ($count = 1; $count <= $amount; $count++) {
            array_push($this->itemsCart, $product);
        }
    }

    public function getItemsCart(): array
    {
        return $this->itemsCart;
    }

    public function countitemsCart()
    {
        return count($this->itemsCart);
    }

    public function removeItemCart($productName, $amount = 1): void
    {
        $itemsCart = $this->itemsCart;

        for ($count = 1; $count <= $amount; $count++) {
            foreach ($itemsCart as $key => $item) {
                if ($productName == $item->getName()) {
                    unset($itemsCart[$key]);
                    break;
                }
            }
        }

        $this->itemsCart = $itemsCart;
    }

    public function removeAllItems(): void
    {
        $this->itemsCart = [];
    }

    public function calculateTotalPrice(): float
    {
        $itemsCart = $this->itemsCart;
        $totalPrice = 0;

        foreach ($itemsCart as $item) {
            $totalPrice += $item->getPrice();
        }

        return $totalPrice;
    }
}
