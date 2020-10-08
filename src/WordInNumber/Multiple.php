<?php

namespace App\WordInNumber;

class Multiple
{
    private int $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function verify(): bool
    {
        $number = $this->number;

        return ($number % 3 == 0 || $number % 5 == 0);
    }
}
