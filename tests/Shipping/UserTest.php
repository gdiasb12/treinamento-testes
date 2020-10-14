<?php

declare(strict_types=1);

namespace Tests\Shipping;

use App\Shipping\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private User $user;
    private string $name;
    private string $address;

    protected function setUp(): void
    {
        $this->name = "Gabriel";
        $this->address = "15600000";

        $this->user = new User($this->name, $this->address);
    }

    public function testIfAClassCanBeInstantiated(): void
    {
        $this->assertInstanceOf(User::class, $this->user);
    }

    public function testReturnsAnUserObject(): void
    {
        $this->assertEquals($this->name, $this->user->getName());
        $this->assertEquals($this->address, $this->user->getAddress());
    }
}
