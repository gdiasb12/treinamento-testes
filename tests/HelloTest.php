<?php
declare(strict_types=1);

namespace Tests;

use App\Hello;
use PHPUnit\Framework\TestCase;

class HelloTest extends TestCase
{
    public function testShouldSayHelloWorld(): void
    {
        $hello = new Hello();
        
        $this->assertEquals('Hello World!', $hello->sayHelloWorld());
    }
}