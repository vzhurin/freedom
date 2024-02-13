<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * Returns list of products sorted by descending creation time
     *
     * @return list<Product>
     */
    public function getAllOrderedByCreatedAtDesc(): array
    {
        return $this->findBy([], ['createdAt' => 'DESC']);
    }
}
