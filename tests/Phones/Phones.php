<?php

namespace App\Tests\Phones;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Phone;
use App\Entity\User;
use App\Tests\TestAbsTrait;

class Phones extends ApiTestCase
{
    use TestAbsTrait;

    private $token;
    private $em;

    protected function setUp(): void
    {
        $this->auth();
        $this->getDoctrine();
    }

    public function testPhonesList()
    {
        $response = self::createClient()->request('GET', '/api/phones', [
            'auth_bearer' => $this->token
        ]);

        self::assertResponseIsSuccessful();
        self::assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');

    }

    public function testPhonesDetail()
    {
        $phone = $this->em->getRepository(Phone::class)->findOneBy([]);
        $response = self::createClient()->request('GET', '/api/phones/' . $phone->getId(), [
            'auth_bearer' => $this->token
        ]);

        self::assertResponseIsSuccessful();
        self::assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
    }
}
