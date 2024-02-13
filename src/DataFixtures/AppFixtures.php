<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Store;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

final class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $oscar = new User('Oscar', 'Arrieta');
        $carlos = new User('Carlos', 'Gomez');

        /**
         * We must pass the creation time with a small difference so that we can see the sorting work
         */
        $store1 = new Store('Store 1', $oscar, new \DateTimeImmutable('+1 second'));
        $store2 = new Store('Store 2', $carlos, new \DateTimeImmutable('-1 second'));

        /**
         * Here's the same trick with creation time
         */
        $product1 = new Product('Product 1', $store1, new \DateTimeImmutable('+1 second'));
        $product2 = new Product('Product 2', $store2, new \DateTimeImmutable('-1 second'));

        /**
         * We have to persist every entity because there is no cascading
         */
        $manager->persist($oscar);
        $manager->persist($carlos);
        $manager->persist($store1);
        $manager->persist($store2);
        $manager->persist($product1);
        $manager->persist($product2);

        $manager->flush();
    }
}
