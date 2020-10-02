<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Error\Error;
use App\Multiple;

class MultipleTest extends TestCase
{
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

    public function testShouldReturnTheSumOfMultiplesOfThreeOrFiveUnderTen(): void
    {
        $multiple = new Multiple(10);
        $this->assertEquals(23, $multiple->calculateMultiplesOfThreeOrFive());
    }

    public function testShouldReturnZeroWhenIsPassedAnValueUnderThree(): void
    {        
        $multiple = new Multiple(rand(-10, 3));
        $this->assertEquals(0, $multiple->calculateMultiplesOfThreeOrFive());        
        $this->assertEquals(0, $multiple->calculateMultiplesOfThreeAndFive());        
        $this->assertEquals(0, $multiple->calculateMultiplesOfThreeOrFiveAndSeven());        
    }

    // public function testShouldReturnTheErrorWhenAnStringIsPassed(): void
    // {
    //     // $this->expectError(Error::class);
        
    //     $multiple = new Multiple(rand(-10, 3));
    //     $this->assertEquals(0, $multiple->calculateMultiplesOfThreeOrFive());
        
    // }
}