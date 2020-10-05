<?php
namespace App;

class Multiple
{
    private int $number;

    public function __construct(int $number = 0)
    {
        $this->number = $number;
    }

    public function calculateMultiplesOfThreeOrFive(): int
    {

        $result = 0;

        for ($counter = 0; $counter < $this->number; $counter++) {
            if ($counter% 3 == 0 || $counter% 5 == 0) {
                $result += $counter;
            }
        }

        return $result;
    }

    public function calculateMultiplesOfThreeAndFive(): int
    {
        $result = 0;

        for ($counter = 0; $counter < $this->number; $counter++) {
            if ($counter% 3 == 0 && $counter% 5 == 0) {
                $result += $counter;
            }
        }
        return $result;
    }

    public function calculateMultiplesOfThreeOrFiveAndSeven(): int
    {
        $result = 0;

        for ($counter = 0; $counter < $this->number; $counter++) {
            if ($counter% 7 == 0 && ($counter% 3 == 0 || $counter% 5 == 0)) {
                $result += $counter;
            }
        }
        return $result;
    }
}
