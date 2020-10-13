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
<<<<<<< HEAD
        $this->assertEquals(0, $this->cart->countItemsCart());
    }

    /**
     * @dataProvider productsProvider
     */
    public function testProductCanBeInsertedIntoTheCart($name, $price, $amount): void
    {
        //Mock of Product Class
        $product = $this->createMock(Product::class, [$name, $price]);

        $this->cart->setItemCart($product, $amount);

        $this->assertEquals($amount, $this->cart->countItemsCart());
    }

    /**
     * @dataProvider productsProvider
     */
    public function testReturnCartItems($name, $price, $amount): void
    {
        //Mock of Product Class
        $product = $this->createMock(Product::class, [$name, $price]);

        $this->cart->setItemCart($product, $amount);

        $this->assertEquals($amount, $this->cart->countItemsCart());

        $itemsCart = $this->cart->getItemsCart();

        $this->assertIsArray($itemsCart);

        foreach ($itemsCart as $item) {
            $this->assertInstanceOf(Product::class, $item);
        }
    }

    public function productsProvider()
    {
        return [
            'one product inserted' => ["T-shirt", 19.90, 1],
            'more than one inserted' => ["Hat", 59.90, rand(2, 5)]
        ];
    }

    /**
     * @dataProvider productsToRemoveProvider
     */
    public function testProductsCanBeRemovedFromTheCart($amountToRemove, $remainingAmount): void
    {
        $product = $this->createMock(Product::class, ["T-shirt", 19.90]);

        $product->method('getName')
            ->willReturn("T-shirt");

        $this->cart->setItemCart($product, 4);

        $this->assertEquals(4, $this->cart->countItemsCart());

        $this->cart->removeItemCart("T-shirt", $amountToRemove);

        $this->assertEquals($remainingAmount, $this->cart->countItemsCart());
    }

    public function productsToRemoveProvider()
    {
        return [
            'remove one, remains three' => [1, 3],
            'remove two, remains two' => [2, 2],
            'remove four, remains zero' => [4, 0]
        ];
    }

    public function testAllTheProductsCanBeRemoved(): void
    {
        $product = $this->createMock(Product::class, ["T-shirt", 19.90]);

        $this->cart->setItemCart($product, 4);

        $this->assertEquals(4, $this->cart->countItemsCart());

        $this->cart->removeAllItems();

        $this->assertEquals(0, $this->cart->countItemsCart());
    }

    /**
     * @dataProvider productsProvider
     */
    public function testReturnsTheTotalPriceOfTheCart($name, $price, $amount): void
    {
        $product = $this->createMock(Product::class, [$name, $price]);

        $product->method('getPrice')
            ->willReturn($price);

        $this->cart->setItemCart($product, $amount);

        $totalPriceExpected = $price * $amount;

        $this->assertEquals($totalPriceExpected, $this->cart->calculateTotalPrice());
=======
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
>>>>>>> 8f8aa26f3a0befacf6685a96f9d25610ba36947c
    }
}
