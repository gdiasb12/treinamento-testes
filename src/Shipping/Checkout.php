<?php

namespace App\Shipping;

use App\Shipping\Service\ShippingServiceInterface;
use App\Shipping\Model\CartInterface;

class Checkout
{
    private ShippingServiceInterface $shippingService;

    public function __construct(ShippingServiceInterface $shippingService)
    {
        $this->shippingService = $shippingService;
    }

    public function calculateTotal(CartInterface $cart): float
    {
        $zipCode = $cart->getUser()->getAddress();

        $totalPrice = $cart->calculateTotalPrice();

        if ($totalPrice >= 100) {
            return $totalPrice;
        }
        
        $shippingCost = $this->shippingService->calculateShippingByZipCode($zipCode);

        return $totalPrice + $shippingCost;
    }
}
