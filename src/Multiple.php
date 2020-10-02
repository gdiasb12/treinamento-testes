<?php
namespace App;

class Multiple
{
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function calculateMultiplesOfThreeOrFive(): int
    {

        $result = 0;
        for ($c = 0; $c < $this->number; $c++) {

            // ($c % 3 == 0 || $c % 5 == 0) ? $result + $c : $result

            // $result = 0;
            if ($c % 3 == 0 || $c % 5 == 0) {
                $result += $c;
            }

            // $result = ($c % 3 == 0 || $c % 5 == 0) ? $result + $c : $result;
        }

        return $result;
    }

    public function calculateMultiplesOfThreeAndFive(): int
    {
        $result = 0;
        for ($c = 0; $c < $this->number; $c++) {
            if ($c % 3 == 0 && $c % 5 == 0) {
                $result += $c;
            }
        }
        return $result;
    }

    public function calculateMultiplesOfThreeOrFiveAndSeven(): int
    {
        $result = 0;
        for ($c = 0; $c < $this->number; $c++) {
            if ($c % 7 == 0 && ($c % 3 == 0 || $c % 5 == 0)) {
                $result += $c;
            }
        }
        return $result;
    }
}
