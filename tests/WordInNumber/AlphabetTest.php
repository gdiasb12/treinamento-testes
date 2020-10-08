<?php

declare(strict_types=1);

namespace Tests\WordInNumber;

use App\WordInNumber\Alphabet;
use PHPUnit\Framework\TestCase;

final class AlphabetTest extends TestCase
{
    public function testIfAClassCanBeInstantiated(): void
    {
        $alphabet = new Alphabet();

        $this->assertInstanceOf(Alphabet::class, $alphabet);
    }

    public function testShouldReturnAnAlphabetList(): void
    {
        $expectedArray = array_merge(
            array_combine(range('a', 'z'), range('1', '26')),
            array_combine(range('A', 'Z'), range('27', '52'))
        );

        $alphabet = new Alphabet();
        
        $this->assertEquals($expectedArray, $alphabet->getList());
    }
}
