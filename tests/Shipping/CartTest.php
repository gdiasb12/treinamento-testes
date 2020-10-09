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
    }
}
