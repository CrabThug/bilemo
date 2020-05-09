<?php

namespace App\Tests\Entity;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Client;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    private $client;

    protected function setUp(): void
    {
        $this->client = new Client();
    }

    public function testGetId()
    {
        $this->assertNull($this->client->getId());
    }

    public function testPassword()
    {
        $this->client->setPassword('test');
        $this->assertSame('test', $this->client->getPassword());
    }

    public function testUsername()
    {
        $this->client->setUsername('test');
        $this->assertSame('test', $this->client->getUsername());
    }

    public function testUser()
    {
        $user = new User();
        $this->client->addUser($user);
        $this->assertNotEmpty($this->client->getUsers());
        $this->client->removeUser($user);
        $this->assertEmpty($this->client->getUsers());
    }
}
