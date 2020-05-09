<?php


namespace App\Tests;


use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;

trait TestAbsTrait
{
    public function auth()
    {
        $response = self::createClient()->request('POST', '/authentication_token', [
            'json' => [
                'username' => 'amazon',
                'password' => 'amazon'
            ]
        ]);
        $this->token = json_decode($response->getContent(), TRUE)['token'];
    }

    public function getDoctrine()
    {
        $kernel = self::bootKernel();
        $this->em = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }
}
