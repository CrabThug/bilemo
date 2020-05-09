<?php

namespace App\Tests\Doctrine;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Doctrine\UsersCollectionExtension;
use App\Entity\Client;
use App\Entity\User;
use App\Tests\TestAbsTrait;
use Doctrine\ORM\QueryBuilder;

class UsersCollectionExtensionTest extends ApiTestCase
{
    use TestAbsTrait;

    private $token;
    private $em;

    protected function setUp(): void
    {
        $this->auth();
        $this->getDoctrine();
    }

    public function testApplyToCollection(): void
    {
        $response = self::createClient()->request('GET', '/api/users', [
            'auth_bearer' => $this->token
        ]);

        self::assertResponseIsSuccessful();
        self::assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
        self::assertMatchesResourceCollectionJsonSchema(User::class);
    }

    public function testApplyToItem(): void
    {
        $client = $this->em->getRepository(Client::class)->findOneBy(['username' => 'amazon']);
        $user = $this->em->getRepository(User::class)->findOneBy(['client' => $client]);

        $response = self::createClient()->request('GET', '/api/users/' . $user->getId(), [
            'auth_bearer' => $this->token
        ]);

        self::assertResponseIsSuccessful();
        self::assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
        self::assertMatchesResourceCollectionJsonSchema(User::class);
    }
}
