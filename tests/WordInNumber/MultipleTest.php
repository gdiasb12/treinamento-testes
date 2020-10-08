<?php
declare (strict_types = 1);

namespace Tests\WordInNumber;

use App\WordInNumber\Multiple;
use PHPUnit\Framework\TestCase;

final class MultipleTest extends TestCase
{
    public function testIfAClassCanBeInstantiated(): void
    {        
        $multiple = new Multiple(rand(0,100));

        $this->assertInstanceOf(Multiple::class, $multiple);
    }

    /**
     * @dataProvider numberProvider
     */
    public function testVerifyIfThatIsMultipleTreeOrFive($number, $expected): void
    {
        $multiple = new Multiple($number);
        
        $this->assertSame($expected, $multiple->verify());
    }

    public function numberProvider()
    {
        return [
            "9 is multiple of 3 or 5" => [9, true],
            "8 isn't multiple of 3 or 5" => [8, false],
            "15 is multiple of 3 or 5" => [10, true]
        ];
    }
}
