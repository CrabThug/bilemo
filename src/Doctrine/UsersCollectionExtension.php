<?php

namespace App\Doctrine;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Repository\UserRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Security;
use App\Entity\User;

final class UsersCollectionExtension implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
{
    private $security;
    private $userRepository;
    private $request;

    public function __construct(Security $security, UserRepository $userRepository, RequestStack $request)
    {
        $this->security = $security;
        $this->userRepository = $userRepository;
        $this->request = $request;
    }

    public function supports(string $resourceClass, string $operationName = NULL, array $context = []): bool
    {
        return User::class === $resourceClass;
    }

    public function applyToItem(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, array $identifiers, string $operationName = NULL, array $context = [])
    {
        $this->addWhere($queryBuilder, $resourceClass);
    }
    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = NULL)
    {
        $this->addWhere($queryBuilder, $resourceClass);
    }

    private function addWhere(QueryBuilder $queryBuilder, string $resourceClass): void
    {
        if (User::class !== $resourceClass || $this->security->isGranted('ROLE_ADMIN') || null === $user = $this->security->getUser()) {
            return;
        }

        $rootAlias = $queryBuilder->getRootAliases()[0];
        $queryBuilder->andWhere(sprintf('%s.client = :current_user', $rootAlias));
        $queryBuilder->setParameter('current_user', $user->getId());
    }
}
