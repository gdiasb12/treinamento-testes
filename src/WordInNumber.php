<?php

namespace App;

use InvalidArgumentException;
use App\Multiple;
use App\HappyNumber;

class WordInNumber
{
    private string $word;

    // private array $alphabet = [];

    public function __construct(string $word)
    {
        self::validateWord($word);

        $this->word = $word;
    }

    private static function validateWord($word)
    {
        if (!preg_match("/^[a-zA-Z]+$/", $word)) {
            throw new InvalidArgumentException("The argument need to be only alphabetical characters with no spaces");
        }
    }

    public function getWordValueInfo()
    {
        $wordValue = $this->calculateWordValue();

        $message = "The value of the word {$this->word} is {$wordValue} and";
        
        $message .= $this->checkPrimeNumber($wordValue) ? " is prime," : " isn't prime,";

        $message .= $this->checkHappyNumber($wordValue) ? " is a happy number," : " isn't a happy number,";

        return $message;
    }

    // public function checkMultiple($number)
    // {
    //     $multiple = new Multiple($number);

    //     return $multiple->calculateMultiplesOfThreeOrFive();
    // }


    public function checkPrimeNumber($number): bool
    {
        for ($count = 2; $count < $number; $count++) {
            if ($number % $count == 0) {
                return false;
            }
        }

        return true;
    }

    public function checkHappyNumber($number): bool
    {
        $happyNumber = new HappyNumber($number);

        return $happyNumber->checkHappyNumber();
    }

    public function generateAlphabetList()
    {
        $alphabetDown = array_combine(range('a', 'z'), range('1', '26'));

        $alphabetUpper = array_combine(range('A', 'Z'), range('27', '52'));

        $alphabet = array_merge($alphabetDown, $alphabetUpper);
        
        return $alphabet;
    }

    public function calculateWordValue()
    {
        $alphabetList = $this->generateAlphabetList();

        $listOfLetters = str_split($this->word);

        $value = 0;

        foreach ($listOfLetters as $letter) {
            $value += $alphabetList[$letter];
        }

        return $value;
    }
}
