<?php

namespace App\WordInNumber;

use App\WordInNumber\Alphabet;

class WordValue
{
    private string $word;

    private array $alphabet;

    public function __construct(string $word, Alphabet $alphabet)
    {
        self::validateWord($word);

        $this->word = $word;
        $this->alphabet = $alphabet->getList();
    }

    private static function validateWord($word)
    {
        if (!preg_match("/^[a-zA-Z]+$/", $word)) {
            throw new \InvalidArgumentException("The argument need to be only alphabetical characters with no spaces");
        }
    }
    
    public function calculateWordValue()
    {
        $alphabetList = $this->alphabet;

        $listOfLetters = str_split($this->word);

        $value = 0;

        foreach ($listOfLetters as $letter) {
            $value += $alphabetList[$letter];
        }

        return $value;
    }
}
