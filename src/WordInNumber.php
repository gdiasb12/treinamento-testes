<?php

namespace App;

use InvalidArgumentException;
use App\HappyNumber;

class WordInNumber
{
    private string $word;

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

        $message = "Word: {$this->word}, value: {$wordValue},";

        $message .= $this->checkPrimeNumber($wordValue) ? " prime," : " not prime,";

        $message .= $this->checkHappyNumber($wordValue) ? " happy number" : " not happy number";
       
        $message .= $this->checkMultiple($wordValue) ? " and multiple of 3 or 5." : " and not multiple of 3 or 5.";

        return $message;
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

    private function checkMultiple($number)
    {
        return ($number % 3 == 0 || $number % 5 == 0);
    }


    private function checkPrimeNumber($number): bool
    {
        for ($count = 2; $count < $number; $count++) {
            if ($number % $count == 0) {
                return false;
            }
        }

        return true;
    }

    private function checkHappyNumber($number): bool
    {
        $happyNumber = new HappyNumber($number);

        return $happyNumber->checkHappyNumber();
    }
}
