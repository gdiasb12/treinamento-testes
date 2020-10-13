<?php

namespace App\Shipping\Service;

interface ShippingServiceInterface
{
   public function calculateShippingByZipCode(string $zipCode);
}
