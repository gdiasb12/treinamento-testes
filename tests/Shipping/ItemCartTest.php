<?php

declare(strict_types=1);

namespace Tests\Shipping;

use App\Shipping\Product;
use App\Shipping\ItemCart;
use PHPUnit\Framework\TestCase;

class ItemCartTest extends TestCase
{
    private ItemCart $itemCart;

    protected function setUp(): void
    {
        //Mock of User Class
        $product = $this->createMock(Product::class, ["Shirt", 29.90]);
        $amount = 2;

        $this->itemCart = new ItemCart($product, $amount);
    }
    
    public function testIfAClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(ItemCart::class, $this->itemCart);
    }

    public function testReturnsAnInstanceOfProductClass(): void
    {
        $this->assertInstanceOf(Product::class, $this->itemCart->getProduct());
    }
}
