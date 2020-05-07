<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\User;
use App\Repository\ClientRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function load(ObjectManager $manager)
    {
        $users = [
            'name' => ['Bravo','Reyes','Grant','Moreno','Jimenez','Young'],
            'firstname' => ['Jhonny','Heather','Eric','Antonio','Debbie','Marshall']
        ];

        $client = $this->clientRepository->findAll();

        for ($i = 0; $i <= 30; $i++) {
            $user = new User();
            $user->setClient($client[array_rand((array)$client)]);
            $user->setFirstname($users['firstname'][array_rand($users['firstname'])]);
            $user->setLastname($users['name'][array_rand($users['name'])]);
            $manager->persist($user);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ClientFixtures::class,
        ];
    }
}
