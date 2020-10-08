<?php

declare(strict_types=1);

namespace Tests;

use App\WordInNumber;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use TypeError;

final class WordInNumberTest extends TestCase
{
    /**
     * @dataProvider incorrectArgumentProvider
     */
    public function testReturnsAnExceptionWhenAnIncorrectArgumentIsPassed($word, $exceptionClass): void
    {
        $this->expectException($exceptionClass);

        $alphabet = new WordInNumber($word);
    }

    public function incorrectArgumentProvider()
    {
        return [
            "can't be alphanumeric" => ["word 1", InvalidArgumentException::class],
            "can't have spaces" => ["word with space", InvalidArgumentException::class],
            "can't have special characters" => ["word@test", InvalidArgumentException::class],
            "can't be null" => [null, TypeError::class],
            "can't be numeric" => [1234, TypeError::class]
        ];
    }

    public function testShouldReturnAnAlphabetList(): void
    {
        $alphabetDown = array_combine(range('a', 'z'), range('1', '26'));

        $alphabetUpper = array_combine(range('A', 'Z'), range('27', '52'));

        $expectedArray = array_merge($alphabetDown, $alphabetUpper);

        $alphabet = new WordInNumber("word");

        $this->assertEquals($expectedArray, $alphabet->generateAlphabetList());
    }

    /**
     * @dataProvider wordsAndValuesProvider
     */
    public function testReturnsTheValueOfTheWord($word, $valueExpected): void
    {
        $alphabet = new WordInNumber($word);

        $this->assertEquals($valueExpected, $alphabet->calculateWordValue());
    }

    public function wordsAndValuesProvider()
    {
        return [
            "abc returns 6" => ["abc", 6],
            "word returns 60" => ["word", 60],
            "ABC returns 84" => ["ABC", 84],
        ];
    }

    /**
     * @dataProvider wordsProvider
     */
    public function testReturnsAllTheInformationAboutWordValue($word, $valueExpected): void
    {
        $alphabet = new WordInNumber($word);

        $this->assertSame($valueExpected, $alphabet->getWordValueInfo());
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
