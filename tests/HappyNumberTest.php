<?php
declare (strict_types = 1);

namespace Tests;

use App\HappyNumber;
use PHPUnit\Framework\TestCase;

final class HappyNumberTest extends TestCase
{
    /**
     * @dataProvider incorrectArgumentProvider
     */
    public function testReturnsAnExceptionWhenAnIncorrectArgumentIsPassed($parameter, $exceptionClass): void
    {
        $this->expectException($exceptionClass);
        
        $happyNumber = new HappyNumber($parameter);
    }

    public function incorrectArgumentProvider()
    {
        return [
            "can't be a negative number" => [-8, \InvalidArgumentException::class],
            "can't be a string" => ["number", \TypeError::class]
        ];
    }

    /**
     * @dataProvider numberProvider
     */
    public function testReturnsIfThatIsAHappyNumberOrNot($number, $expected): void
    {
        // $number = 7;
        $happyNumber = new HappyNumber($number);
        
        $this->assertSame($expected, $happyNumber->checkHappyNumber());
    }

    public function numberProvider()
    {
        return [
            "7 is a Happy Number!" => [7, true],
            "8 isn't a Happy Number!" => [8, false],
<<<<<<< HEAD
            "11 isn't a Happy Number!" => [11, false]
=======
            "11 is a Happy Number!" => [11, false]
>>>>>>> 726e11b0c8e18caa091317accc790cb076d9f9c6
        ];
    }
}
