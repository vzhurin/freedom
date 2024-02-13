<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/products')]
final class ProductController extends AbstractController
{
    public function __construct(
        private readonly ProductRepository $repository,
        private readonly SerializerInterface $serializer,
    ) {

    }

    /**
     * Returns serialized products with store and user
     */
    #[Route('/with_store_and_user', name: 'app.products.with_store_and_user')]
    public function productsWithStoresAndUsers(): Response
    {
        return new Response($this->serializer->serialize(
            $this->repository->getAllOrderedByCreatedAtDesc(),'json', ['groups' => ['product.with_store_and_user']]
        ));
    }

    /**
     * Returns serialized products with users
     */
    #[Route('/with_user', name: 'app.products.with_user')]
    public function productsWithUsers(): Response
    {
        return new Response($this->serializer->serialize(
            $this->repository->getAllOrderedByCreatedAtDesc(),'json', ['groups' => ['product.with_user']]
        ));
    }
}
