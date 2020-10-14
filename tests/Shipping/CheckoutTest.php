<?php

declare(strict_types=1);

namespace Tests\Shipping;

use App\Shipping\Checkout;
use App\Shipping\Model\User;
use App\Shipping\Model\Cart;
use App\Shipping\Service\ShippingService;
use PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase
{
    private Checkout $checkout;
    private $cart;

    protected function setUp(): void
    {
        //Mock of User Class
        $user = $this->createMock(User::class);
        $user->method("getAddress")->willReturn("15600000");
        
        $this->cart = $this->createMock(Cart::class);
        $this->cart->method("getUser")->willReturn($user);

        $shippingService = $this->createMock(ShippingService::class);
        $shippingService->method("calculateShippingByZipCode")->willReturn(100);

        $this->checkout = new Checkout($shippingService);
    }

    public function testIfAClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(Checkout::class, $this->checkout);
    }

    /**
     * @dataProvider valueProvider
     */
    public function testReturnTheTotalPriceWithShippingCost($value, $valueExpected): void
    {
        $this->cart->method("calculateTotalPrice")->willReturn($value);

        $this->assertEquals($valueExpected, $this->checkout->calculateTotal($this->cart));
    }

    public function valueProvider()
    {
        return [
            "value under 100" => [79.90, 179.90],
            "value 100" => [100.0, 100.0],
            "value over 100" => [129.90, 129.90]
        ];
    }
}
