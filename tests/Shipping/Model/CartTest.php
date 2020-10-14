<?php

declare(strict_types=1);

namespace Tests\Shipping\Model;

use App\Shipping\Model\User;
use App\Shipping\Model\Cart;
use App\Shipping\Model\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    private Cart $cart;

    protected function setUp(): void
    {
        //Mock of User Class
        $user = $this->createMock(User::class);

        $this->cart = new Cart($user);
    }

    public function testIfAClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(Cart::class, $this->cart);
    }

    public function testReturnsZeroItemsWhenIsEmpty(): void
    {
        $this->assertEquals(0, $this->cart->countItemsCart());
    }

    public function testReturnsTotalPriceAsZeroWhenIsEmpty(): void
    {
        $this->assertEquals(0, $this->cart->calculateTotalPrice());
    }

    public function testReturnTheCartUser(): void
    {
        $this->assertInstanceOf(User::class, $this->cart->getUser());
    }

    /**
     * @dataProvider productsProvider
     */
    public function testProductCanBeInsertedIntoTheCart($amount): void
    {
        //Mock of Product Class
        $product = $this->createMock(Product::class);

        $this->cart->setItemCart($product, $amount);

        $this->assertEquals($amount, $this->cart->countItemsCart());
    }

    public function productsProvider()
    {
        return [
            'one product inserted' => [1],
            'two products inserted' => [2],
            'more than two inserted' => [rand(3, 10)]
        ];
    }

    public function testReturnCartItems(): void
    {
        $amount = rand(2, 10);
        //Mock of Product Class
        $product = $this->createMock(Product::class);

        $this->cart->setItemCart($product, $amount);

        $this->assertEquals($amount, $this->cart->countItemsCart());

        $itemsCart = $this->cart->getItemsCart();

        $this->assertIsArray($itemsCart);

        foreach ($itemsCart as $item) {
            $this->assertInstanceOf(Product::class, $item);
        }
    }

    /**
     * @dataProvider productsToRemoveProvider
     */
    public function testProductsCanBeRemovedFromTheCart($amountToRemove, $remainingAmount): void
    {
        $product = $this->createMock(Product::class);

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
        $product = $this->createMock(Product::class);

        $this->cart->setItemCart($product, 4);

        $this->assertEquals(4, $this->cart->countItemsCart());

        $this->cart->removeAllItems();

        $this->assertEquals(0, $this->cart->countItemsCart());
    }

    /**
     * @dataProvider productsProvider
     */
    public function testReturnsTheTotalPriceOfTheCart($amount): void
    {
        $price = 19.90;

        $product = $this->createMock(Product::class);

        $product->method('getPrice')
            ->willReturn($price);

        $this->cart->setItemCart($product, $amount);

        $totalPriceExpected = $price * $amount;

        $this->assertEquals($totalPriceExpected, $this->cart->calculateTotalPrice());
    }
}
