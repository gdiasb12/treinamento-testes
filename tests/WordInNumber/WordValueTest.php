<?php

declare(strict_types=1);

namespace Tests\WordInNumber;

use App\WordInNumber\WordValue;
use App\WordInNumber\Alphabet;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use TypeError;

final class WordValueTest extends TestCase
{
    /**
     * @dataProvider incorrectArgumentProvider
     */
    public function testReturnsAnExceptionWhenAnIncorrectArgumentIsPassed($word, $exceptionClass): void
    {
        $this->expectException($exceptionClass);

        $alphabet = new Alphabet();

        $wordValue = new WordValue($word, $alphabet);
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

    /**
     * @dataProvider wordsAndValuesProvider
     */
    public function testReturnsTheValueOfTheWord($word, $valueExpected): void
    {
        $alphabetList = array_merge(
            array_combine(range('a', 'z'), range('1', '26')),
            array_combine(range('A', 'Z'), range('27', '52'))
        );

        $alphabet = $this->createMock(Alphabet::class);

        $alphabet->method('getList')
            ->willReturn($alphabetList);

        $wordValue = new WordValue($word, $alphabet);

        $this->assertEquals($valueExpected, $wordValue->calculateWordValue());
    }

    public function wordsAndValuesProvider()
    {
        return [
            "abc returns 6" => ["abc", 6],
            "word returns 60" => ["word", 60],
            "ABC returns 84" => ["ABC", 84],
        ];
    }
}
