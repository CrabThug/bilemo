<?php

namespace App\Tests\DataPersister;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\DataPersister\UserDataPersister;
use App\Entity\User;
use App\Tests\TestAbsTrait;
use PHPUnit\Framework\TestCase;

class UserDataPersisterTest extends ApiTestCase
{
    use TestAbsTrait;

    private $token;
    private $em;

    protected function setUp(): void
    {
        $this->auth();
        $this->getDoctrine();
    }

    public function testPersist()
    {
        $response = self::createClient()->request('POST', '/api/users', [
            'auth_bearer' => $this->token,
            'json' => [
                'firstname' => 'test',
                'lastname' => 'test'
            ]
        ]);

        self::assertResponseIsSuccessful();
        self::assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');

    }

    public function testRemove()
    {
        $user = $this->em->getRepository(User::class)->findOneBy(['firstname' => 'test']);

        $response = self::createClient()->request('DELETE', '/api/users/' . $user->getId(), [
            'auth_bearer' => $this->token,
        ]);

        self::assertResponseIsSuccessful();
    }
}
