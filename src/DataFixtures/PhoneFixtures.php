<?php

namespace App\DataFixtures;

use App\Entity\Phone;
use App\Repository\SupplierRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PhoneFixtures extends Fixture implements DependentFixtureInterface
{
    private $supplierRepository;

    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function load(ObjectManager $manager)
    {
        $data = [
            'apple' => ['SE', '11', '11 Pro', 'Xr', '12'],
            'samsung' => ['Galaxy Z', 'A10', 'A71', 'S20'],
            'nokia' => ['7.2', '6.2', '9'],
            'google' => ['Pixel 4', 'Pixel 3a']
        ];

        foreach ($data as $key => $smartphone) {
            foreach ($smartphone as $s) {
                $phone = new Phone();
                $phone->setName($s);
                $phone->setSupplier(($this->supplierRepository->findOneBy(['name' => $key])));
                $manager->persist($phone);
            }
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SupplierFixtures::class,
        ];
    }
}
