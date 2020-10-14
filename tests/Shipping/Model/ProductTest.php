<?php

declare(strict_types=1);

namespace Tests\Shipping\Model;

use App\Shipping\Model\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    private Product $product;
    private string $name;
    private float $price;

    protected function setUp(): void
    {
        $this->name = "Shirt";
        $this->price = 29.90;

        $this->product = new Product($this->name, $this->price);
    }

    public function testIfAClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(Product::class, $this->product);
    }

    public function testReturnsAnProductObject(): void
    {
        $this->assertEquals($this->name, $this->product->getName());
        $this->assertEquals($this->price, $this->product->getPrice());
    }
}
