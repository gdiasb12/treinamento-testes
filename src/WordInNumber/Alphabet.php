<?php

namespace App\WordInNumber;

class Alphabet
{
    private array $list;

    public function __construct()
    {
        $this->list = $this->generateAlphabetList();
    }

    public function generateAlphabetList()
    {
        $alphabet = array_merge(
            array_combine(
                range('a', 'z'),
                range('1', '26')
            ),
            array_combine(
                range('A', 'Z'),
                range('27', '52')
            )
        );

        return $alphabet;
    }

    public function getList(): array
    {
        return $this->list;
    }
}
