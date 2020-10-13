<?php

namespace App\Shipping;

use App\Shipping\User;
use App\Shipping\ItemCart;
use App\Shipping\Product;

class Cart
{
    private User $user;
    // /** @var array<Product> $itemCart a list of products with the amount */
<<<<<<< HEAD
    private array $itemsCart = [];
=======
    private array $itensCart = [];
>>>>>>> 8f8aa26f3a0befacf6685a96f9d25610ba36947c

    public function __construct(User $user)
    {
        $this->user = $user;
    }

<<<<<<< HEAD
    public function getUser(): User
=======
    public function getUser()
>>>>>>> 8f8aa26f3a0befacf6685a96f9d25610ba36947c
    {
        return $this->user;
    }

<<<<<<< HEAD
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
=======
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
>>>>>>> 8f8aa26f3a0befacf6685a96f9d25610ba36947c
    }

    public function removeItemCart($productName, $amount = 1): void
    {
<<<<<<< HEAD
        $itemsCart = $this->itemsCart;

        for ($count = 1; $count <= $amount; $count++) {
            foreach ($itemsCart as $key => $item) {
                if ($productName == $item->getName()) {
                    unset($itemsCart[$key]);
=======
        $itensCart = $this->itensCart;

        for ($count = 1; $count <= $amount; $count++) {
            foreach ($itensCart as $key => $item) {
                if ($productName == $item->getName()) {
                    unset($itensCart[$key]);
>>>>>>> 8f8aa26f3a0befacf6685a96f9d25610ba36947c
                    break;
                }
            }
        }
<<<<<<< HEAD

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

        return number_format($totalPrice, 2, '.', '');
=======
        
        $this->itensCart = $itensCart;
>>>>>>> 8f8aa26f3a0befacf6685a96f9d25610ba36947c
    }
}
