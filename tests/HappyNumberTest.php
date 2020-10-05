<?php
declare (strict_types = 1);

namespace Tests;

use App\HappyNumber;
use PHPUnit\Framework\TestCase;

final class HappyNumberTest extends TestCase
{
    public function testShouldReturnAnExceptionWhenAnStringIsPassed(): void
    {
        $this->expectException(\TypeError::class);
        
        $happyNumber = new HappyNumber("number");
    }

    public function testShouldReturnAnExceptionWhenAnNegativeNumberIsPassed(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $happyNumber = new HappyNumber(-8);
    }

    public function testIfThatIsAHappyNumberReturnsAMessage(): void
    {
        $number = 7;
        $happyNumber = new HappyNumber($number);
        
        $this->assertSame("The number {$number}, is a Happy Number!", $happyNumber->checkHappyNumber());
    }

    public function testIfThatIsNotAHappyNumberReturnsAMessage(): void
    {
        $number = 8;
        $happyNumber = new HappyNumber($number);
        
        $this->assertSame("The number {$number}, isn't a Happy Number!", $happyNumber->checkHappyNumber());
    }

}
