<?php

namespace App\DataFixtures;

use App\Entity\Supplier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SupplierFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = ['Apple', 'Google', 'Samsung', 'Nokia'];

        foreach ($data as $d) {
            $supplier = new Supplier();
            $supplier->setName($d);
            $manager->persist($supplier);
        }

        $manager->flush();
    }
}
