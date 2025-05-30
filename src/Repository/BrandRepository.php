<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Resource\Doctrine\Persistence\RepositoryInterface;

final class BrandRepository extends EntityRepository implements RepositoryInterface
{
    public function findEnabled(): array
    {
        return $this->createEnabledQueryBuilder()
            ->getQuery()
            ->getResult()
        ;
    }

    public function createEnabledQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.enabled = true')
            ;
    }
}
