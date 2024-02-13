<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Store;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class StoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Store::class);
    }

    /**
     * Returns list of stores sorted by descending creation time
     *
     * @return list<Store>
     */
    public function getAllOrderedByCreatedAtDesc(): array
    {
        return $this->findBy([], ['createdAt' => 'DESC']);
    }
}
