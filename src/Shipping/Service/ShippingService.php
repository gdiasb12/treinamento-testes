<?php

namespace App\Shipping\Service;

use App\Shipping\Service\ShippingServiceInterface;

class ShippingService implements ShippingServiceInterface
{
    public function calculateShippingByZipCode(string $zipCode)
    {
        return 100;
    }
}
