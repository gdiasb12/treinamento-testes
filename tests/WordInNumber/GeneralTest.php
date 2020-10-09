<?php

declare(strict_types=1);

namespace Tests\WordInNumber;

use App\HappyNumber;
use App\WordInNumber\General;
use App\WordInNumber\Prime;
use App\WordInNumber\Multiple;
use PHPUnit\Framework\TestCase;

final class GeneralTest extends TestCase
{
    /**
     * @dataProvider infoProvider
     */
    public function testReturnsAllTheInformationAboutWordValue(
        $word,
        $value,
        $isPrime,
        $isHappy,
        $isMultiple,
        $returnExpected
    ): void {
        //Mock of Prime Class
        $prime = $this->createMock(Prime::class, $value);

        $prime->method('verify')
            ->willReturn($isPrime);

        //Mock of HappyNumber Class
        $happyNumber = $this->createMock(HappyNumber::class, $value);

        $happyNumber->method('checkHappyNumber')
            ->willReturn($isHappy);

        //Mock of Multiple Class
        $multiple = $this->createMock(Multiple::class, $value);

        $multiple->method('verify')
            ->willReturn($isMultiple);

        $general = new General($word, $value, $prime, $happyNumber, $multiple);

        $this->assertSame($returnExpected, $general->getInformation());
    }

    public function infoProvider()
    {
        return [
            "'abca', 7, prime, happy, not multiple" =>
            [
                "abca",
                7,
                true,
                true,
                false,
                "Word: abca, value: 7, prime, happy number and not multiple of 3 or 5."
            ],
            "'ABC', 84, not prime, not happy, multiple" =>
            [
                "ABC",
                84,
                false,
                false,
                true,
                "Word: ABC, value: 84, not prime, not happy number and multiple of 3 or 5."
            ],
            "'objective', 91, not prime, happy, not multiple" =>
            [
                "objective",
                91,
                false,
                true,
                false,
                "Word: objective, value: 91, not prime, happy number and not multiple of 3 or 5."
            ],
            "'test', 64, not prime, not happy, not multiple" =>
            [
                "test",
                64,
                false,
                false,
                false,
                "Word: test, value: 64, not prime, not happy number and not multiple of 3 or 5."
            ],
        ];
    }
}
