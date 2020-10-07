<?php

declare(strict_types=1);

namespace Tests;

use App\Multiple;
use PHPUnit\Framework\TestCase;

final class MultipleTest extends TestCase
{
    /**
     * @dataProvider incorrectArgumentProvider
     */
    public function testReturnsAnExceptionWhenAnIncorrectArgumentIsPassed($parameter, $exceptionClass): void
    {
        $this->expectException($exceptionClass);

        $multiple = new Multiple($parameter);
    }

    public function incorrectArgumentProvider()
    {
        return [
            "can't be a negative number" => [-8, \InvalidArgumentException::class],
            "can't be a string" => ["number", \TypeError::class]
        ];
    }

    public function testShouldReturnTheSumOfMultiplesOfThreeOrFiveUnderTen(): void
    {
        $multiple = new Multiple(10);

        $this->assertEquals(23, $multiple->calculateMultiplesOfThreeOrFive());
    }

    public function testShouldReturnTheSumOfMultiplesOfThreeOrFiveUnderThousand(): void
    {
        $multiple = new Multiple(1000);

        $this->assertEquals(233168, $multiple->calculateMultiplesOfThreeOrFive());
    }

    public function testShouldReturnTheSumOfMultiplesOfThreeAndFiveUnderThousand(): void
    {
        $multiple = new Multiple(1000);

        $this->assertEquals(33165, $multiple->calculateMultiplesOfThreeAndFive());
    }

    public function testShouldReturnTheSumOfMultiplesOfThreeOrFiveAndSevenUnderThousand(): void
    {
        $multiple = new Multiple(1000);

        $this->assertEquals(33173, $multiple->calculateMultiplesOfThreeOrFiveAndSeven());
    }

    public function testShouldReturnZeroWhenIsPassedAnValueUnderThree(): void
    {
        $multiple = new Multiple(rand(0, 3));

        $this->assertEquals(0, $multiple->calculateMultiplesOfThreeOrFive());
        $this->assertEquals(0, $multiple->calculateMultiplesOfThreeAndFive());
        $this->assertEquals(0, $multiple->calculateMultiplesOfThreeOrFiveAndSeven());
    }

    public function testShouldReturnZeroWhenNoArgumentsArePassed(): void
    {
        $multiple = new Multiple();

        $this->assertEquals(0, $multiple->calculateMultiplesOfThreeOrFive());
        $this->assertEquals(0, $multiple->calculateMultiplesOfThreeAndFive());
        $this->assertEquals(0, $multiple->calculateMultiplesOfThreeOrFiveAndSeven());
    }
}
