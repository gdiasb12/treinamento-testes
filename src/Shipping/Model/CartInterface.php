<?php

namespace App\Shipping\Model;

use App\Shipping\Model\User;

interface CartInterface
{
    public function getUser(): User;

    public function calculateTotalPrice(): float;
}
