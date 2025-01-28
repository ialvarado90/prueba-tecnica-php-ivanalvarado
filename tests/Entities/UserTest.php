<?php

use App\Entities\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserCanBeCreatedSuccessfully()
    {
        $user = new User('Ivan Alvarado', 'ivan.alvarado@mail.com', 'abc123def', '+51999999999');

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Ivan Alvarado', $user->getNombres());
        $this->assertEquals('ivan.alvarado@mail.com', $user->getEmail());
        $this->assertEquals('+51999999999', $user->getPhoneNumber());
    }

    public function testCanSetName(): void
    {
        $user = new User('Ivan Alvarado', 'ivan.alvarado@mail.com', 'abc123def', '+51999999999');
        $user->setNombres('Ivan Alvarado');

        $this->assertEquals('Ivan Alvarado', $user->getNombres());
    }

    public function testEmailValidation(): void
    {
        $user = new User('Ivan Alvarado', 'ivan.alvarado', 'abc123def', '+51999999999');
        $this->assertFalse(filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL));
    }
}
