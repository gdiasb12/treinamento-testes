<?php
declare (strict_types = 1);

namespace Tests\WordInNumber;

use App\WordInNumber\Prime;
use PHPUnit\Framework\TestCase;

final class PrimeTest extends TestCase
{
    public function testIfAClassCanBeInstantiated(): void
    {        
        $prime = new Prime(rand(0,100));

        $this->assertInstanceOf(Prime::class, $prime);
    }

    /**
     * @dataProvider numberProvider
     */
    public function testVerifyIfThatIsAPrimeNumber($number, $expected): void
    {
        $prime = new Prime($number);
        
        $this->assertSame($expected, $prime->verify());
    }

    public function numberProvider()
    {
        return [
            "7 is prime" => [7, true],
            "8 isn't prime" => [8, false],
            "11 is prime" => [11, true]
        ];
    }
}
