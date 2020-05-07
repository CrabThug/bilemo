<?php

namespace App\DataFixtures;

use App\Entity\Specification;
use App\Repository\PhoneRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SpecificationFixtures extends Fixture implements DependentFixtureInterface
{
    private $phoneRepository;

    public function __construct(PhoneRepository $phoneRepository)
    {

        $this->phoneRepository = $phoneRepository;
    }

    public function load(ObjectManager $manager)
    {

        $amperage = ['1500', '2600'];
        $diag = ['3,5', '4', '4,7', '5,5', '5,8', '6,1', '6,5'];
        $resolution = ['WVGA', 'HD', 'Full HD', 'WQHD', 'QHD+'];
        $network = ['GSM', '3G', '4G', '5G'];
        $memory = ['1024', '2048', '4096', '8192', '16384'];
        $sensor = [
            'Triple-camera setup',
            '12Mp 1/2.55″ sensor, 26mm-equivalent f/1.8-aperture lens, PDAF, OIS',
            '12Mp sensor, 13mm-equivalent f/2.4-aperture lens',
            '12Mp 1/3.4″ sensor, 52mm-equivalent f/2.0-aperture lens, PDAF, OIS',
            'Quad-LED dual-tone flash',
            '4K video, 2160p/60fps (1080p/30fps default)'
        ];

        $phones = $this->phoneRepository->findAll();

        foreach ($phones as $phone) {
            $spec = new Specification();
            $spec->setBatteryCapacity($amperage[array_rand($amperage)] . ' mAh');
            $spec->setDiagonal($diag[array_rand($diag)]);
            $spec->setResolution($resolution[array_rand($resolution)]);
            $spec->setDualSlim(random_int(0, 1));
            $spec->setExternalMemory($memory[array_rand($memory)]);
            $spec->setInternalMemory($memory[array_rand($memory)]);
            $spec->setFrontPhotoSensor($sensor[array_rand($sensor)]);
            $spec->setPhotoSensor($sensor[array_rand($sensor)]);
            $spec->setHeight(random_int(115.5, 138.4));
            $spec->setLux(random_int(0.3, 4.2));
            $spec->setNfc(random_int(0, 1));
            $spec->setNetwork($network[array_rand($network)]);
            $spec->setThick(random_int(6.9, 12.3));
            $spec->setWeight(random_int(112, 226));
            $spec->setWidth(random_int(58.6, 78.1));
            $spec->setPhone($phone);
            $manager->persist($spec);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PhoneFixtures::class,
        ];
    }
}
