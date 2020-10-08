<?php

namespace App\WordInNumber;

class Prime
{
    private int $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function verify(): bool
    {
        $number = $this->number;

        for ($count = 2; $count < $number; $count++) {
            if ($number % $count == 0) {
                return false;
            }
        }

        return true;
    }
}
