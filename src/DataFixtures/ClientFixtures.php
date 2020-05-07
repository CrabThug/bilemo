<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ClientFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $data = ['amazon', 'h&m', 'darty', 'fnac'];

        foreach ($data as $d) {
            $client = new Client();
            $client->setUsername($d);
            $client->setPassword($this->passwordEncoder->encodePassword($client,$d));
            $manager->persist($client);
        }

        $manager->flush();
    }
}
