<?php

namespace App;

class HappyNumber
{
    private int $number;
    private array $listOfNumbers = [];

    public function __construct(int $number = 0)
    {
        self::validateNumber($number);

        $this->number = $number;
        $this->setValueIntoListOfNumber($this->number);
    }

    private static function validateNumber($number)
    {
        if (!is_int($number) || ($number < 0)) {
            throw new \InvalidArgumentException("The argument must be an int and positive number.  Given value: '{$number}'");
        }
    }

    public function checkHappyNumber(): string
    {
        $number = $this->number;
        
        if ($this->validateHappyNumber($number)) {
            return "The number {$number}, is a Happy Number!";
        }

        return "The number {$number}, isn't a Happy Number!";
    }

    private function validateHappyNumber($number)
    {
        $sumOfSquaredValues = $this->calculateSquaredValue($number);

        if ($this->searchValueIntoListOfNumber($sumOfSquaredValues)) {
            return false;
        }

        if ($sumOfSquaredValues == 1) {
            return true;
        }

        $this->setValueIntoListOfNumber($sumOfSquaredValues);

        return $this->validateHappyNumber($sumOfSquaredValues);
    }

    private function calculateSquaredValue($value): int
    {
        $sumOfSquaredValues = 0;

        $arrayDigits = str_split($value);

        foreach ($arrayDigits as $digit) {
            $squaredValue = $digit * $digit;
            $sumOfSquaredValues += $squaredValue;
        }

        return $sumOfSquaredValues;
    }

    private function setValueIntoListOfNumber($number)
    {
        array_push($this->listOfNumbers, $number);
    }

    private function searchValueIntoListOfNumber($number): bool
    {
        if (array_search($number, $this->listOfNumbers) === FALSE) {
            return false;
        }

        return true;
    }
}
