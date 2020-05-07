<?php


namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

class UserDataPersister implements ContextAwareDataPersisterInterface
{
    private $security;
    private EntityManagerInterface $em;

    public function __construct(Security $security, EntityManagerInterface $em)
    {
        $this->security = $security;
        $this->em = $em;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof User;
    }

    public function persist($data, array $context = [])
    {
        $data->setClient($this->security->getUser());
        $this->em->persist($data);
        $this->em->flush();
        return $data;
    }

    public function remove($data, array $context = [])
    {
        $client = $this->security->getUser();
        if ($client === $data->getClient()) {
            $this->em->remove($data);
            $this->em->flush();
        }
    }
}
