<?php

declare(strict_types=1);

namespace Tests\Shipping\Service;

use App\Shipping\Service\ShippingService;
use PHPUnit\Framework\TestCase;

class ShippingServiceTest extends TestCase
{
    private ShippingService $shippingService;

    protected function setUp(): void
    {
        $this->shippingService = new ShippingService();
    }

    public function testIfAClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(ShippingService::class, $this->shippingService);
    }

    public function testReturnsTheShippingCostByZipCode(): void
    {
        $shippingCost = $this->shippingService->calculateShippingByZipCode("1560000");
        
        $this->assertEquals(100, $shippingCost);
    }
}
