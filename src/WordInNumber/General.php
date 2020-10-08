<?php

namespace App\WordInNumber;

use App\HappyNumber;
use App\WordInNumber\Prime;
use App\WordInNumber\Multiple;

class General
{
    private string $word;

    private int $value;

    private bool $prime;

    private bool $happyNumber;

    private bool $multiple;

    public function __construct(
        string $word,
        int $value,
        Prime $prime,
        HappyNumber $happyNumber,
        Multiple $multiple
    ) {
        $this->word = $word;
        $this->value = $value;
        $this->prime = $prime->verify();
        $this->happyNumber = $happyNumber->checkHappyNumber();
        $this->multiple = $multiple->verify();
    }

    public function getInformation()
    {

        $message = "Word: {$this->word}, value: {$this->value},";

        $message .= $this->prime ? " prime," : " not prime,";

        $message .= $this->happyNumber ? " happy number" : " not happy number";

        $message .= $this->multiple ? " and multiple of 3 or 5." : " and not multiple of 3 or 5.";

        return $message;
    }
}
