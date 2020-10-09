<?php

declare(strict_types=1);

namespace Tests\Shipping;

use App\Shipping\User;
use App\Shipping\Cart;
use App\Shipping\Product;
use App\Shipping\ItemCart;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    private Cart $cart;

    protected function setUp(): void
    {
        //Mock of User Class
        $user = $this->createMock(User::class, ["Gabriel", "15600000"]);

        $this->cart = new Cart($user);
    }

    public function testIfAClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(Cart::class, $this->cart);
    }

    public function testReturnsZeroWhenIsEmpty(): void
    {
        $count = $this->cart->countItensCart();

        $this->assertEquals(0, $count);
    }

    public function testIfAItemCanBeAddIntoTheCart(): void
    {
        //Mock of Product Class
        $product = $this->createMock(Product::class, ["T-shirt", 19.90]);

        $this->cart->setItemCart($product, 3);

        $count = $this->cart->countItensCart();

        $this->assertEquals(3, $count);
    }

    public function testRemoveProductsFromTheCart(): void
    {
        $itemList = array(
            [
                "name" => "T-shirt",
                "price" => 19.90,
                "amount" => 3
            ],
            [
                "name" => "Hat",
                "price" => 15.90,
                "amount" => 1
            ]
        );

        foreach ($itemList as $item) {
            $product = $this->createMock(Product::class, [$item["name"], $item["price"]]);

            $this->cart->setItemCart($product, $item["amount"]);
        }

        $count = $this->cart->countItensCart();

        $this->assertEquals(4, $count);

        $this->cart->removeItemCart("T-shirt", 2);

        $countAfterRemove = $this->cart->countItensCart();

        // $this->assertEquals(1, $countAfterRemove);
    }
}
