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
        if ($this->calculateSquaredValue($this->number)) {
            return "The number {$this->number}, is a Happy Number!";
        } else {
            return "The number {$this->number}, isn't a Happy Number!";
        }
    }

    private function calculateSquaredValue($value)
    {
        $sumOfSquaredValues = 0;

        $arrayDigits = str_split($value);

        foreach ($arrayDigits as $digit) {
            $squaredValue = $digit * $digit;
            $sumOfSquaredValues += $squaredValue;
        }

        if ($this->searchValueIntoListOfNumber($sumOfSquaredValues)) {

            return false;
        } else {

            if ($sumOfSquaredValues == 1) {
                
                return true;
            }

            $this->setValueIntoListOfNumber($sumOfSquaredValues);

        }

        return $this->calculateSquaredValue($sumOfSquaredValues);
    }

    private function setValueIntoListOfNumber($number)
    {
        array_push($this->listOfNumbers, $number);
    }

    private function searchValueIntoListOfNumber($number): bool
    {
        if (array_search($number, $this->listOfNumbers) === FALSE) {
            return false;
        } else {
            return true;
        }
    }
}
