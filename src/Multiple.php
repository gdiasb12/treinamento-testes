<?php
namespace App;

final class Multiple
{
    private int $number;

    public function __construct(int $number = 0)
    {
        self::validateNumber($number);

        $this->number = $number;
    }

    private static function validateNumber($number)
    {
        if (!is_int($number) || ($number < 0)) {
            throw new \InvalidArgumentException("The argument must be an int and positive number.  Given value: '{$number}'");
        }
    }

    public function calculateMultiplesOfThreeOrFive(): int
    {
        return $this->calculateMultiple(function($counter) {
            return ($counter % 3 == 0 || $counter % 5 == 0);
        });
    }

    public function calculateMultiplesOfThreeAndFive(): int
    {
        return $this->calculateMultiple(function($counter) {
            return ($counter % 3 == 0 && $counter % 5 == 0);
        });
    }

    public function calculateMultiplesOfThreeOrFiveAndSeven(): int
    {
        return $this->calculateMultiple(function($counter) {
            return ($counter % 7 == 0 && ($counter % 3 == 0 || $counter % 5 == 0));
        });
    }

    private function calculateMultiple($rule): int
    {
        $result = 0;
        
        for ($counter = 0; $counter < $this->number; $counter++) {
            if ($rule($counter)) {
                $result += $counter;
            }
        }
        return $result;    
    }
}
