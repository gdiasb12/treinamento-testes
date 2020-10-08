<?php

declare(strict_types=1);

namespace Tests\WordInNumber;

use App\HappyNumber;
use App\WordInNumber\General;
use App\WordInNumber\Prime;
use App\WordInNumber\Multiple;
use App\WordInNumber\Alphabet;
use App\WordInNumber\WordValue;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use TypeError;

final class GeneralTest extends TestCase
{
    /**
     * @dataProvider wordsProvider
     */
    public function testReturnsAllTheInformationAboutWordValue($word, $valueExpected): void
    {
        
        $alphabet = new Alphabet(rand(0,100));

        $wordValue = new WordValue($word, $alphabet);

        $value = $wordValue->calculateWordValue();

        $prime = new Prime($value);
        
        $multiple = new Multiple($value);

        $happyNumber = new HappyNumber($value);
        
        $general = new General($word, $value, $prime, $happyNumber, $multiple);

        $this->assertSame($valueExpected, $general->getInformation());
    }

    public function wordsProvider()
    {
        return [
            "'abca', 7, prime, happy, not multiple" =>
            [
                "abca",
                "Word: abca, value: 7, prime, happy number and not multiple of 3 or 5."
            ],
            "'ABC', 84, not prime, not happy, multiple" =>
            [
                "ABC",
                "Word: ABC, value: 84, not prime, not happy number and multiple of 3 or 5."
            ],
            "'objective', 91, not prime, happy, not multiple" =>
            [
                "objective",
                "Word: objective, value: 91, not prime, happy number and not multiple of 3 or 5."
            ],
            "'test', 64, not prime, not happy, not multiple" =>
            [
                "test",
                "Word: test, value: 64, not prime, not happy number and not multiple of 3 or 5."
            ],
        ];
    }
}
