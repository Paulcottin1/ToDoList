<?php


namespace App\Tests\App\Entity;


use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testEntity() {
        $user = new User();
        $user->setUsername('username')
            ->setPassword('password')
            ->setRole('ROLE_USER');

        $this->assertNotNull($user->getUsername());
        $this->assertNotNull($user->getPassword());
        $this->assertNotNull($user->getRole());

        return $user;
    }
}
