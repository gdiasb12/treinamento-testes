<?php
declare (strict_types = 1);

namespace Tests;

use App\Multiple;
use PHPUnit\Framework\TestCase;

class MultipleTest extends TestCase
{

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

    public function testShouldReturnAnExceptionWhenAnNegativeNumberIsPassed(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $multiple = new Multiple(-8);
    }

    public function testShouldReturnAnExceptionWhenAnStringIsPassed(): void
    {
        $this->expectException(\TypeError::class);
        
        $multiple = new Multiple("number");
    }
}
