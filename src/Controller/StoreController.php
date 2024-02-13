<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\StoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/stores')]
final class StoreController extends AbstractController
{
    public function __construct(
        private readonly StoreRepository $repository,
        private readonly SerializerInterface $serializer,
    ) {

    }

    /**
     * Returns serialized stores with users
     */
    #[Route('/with_user', name: 'app.stores.with_user')]
    public function storesWithUsers(): Response
    {
        return new Response($this->serializer->serialize(
            $this->repository->getAllOrderedByCreatedAtDesc(),'json', ['groups' => ['store.with_user']]
        ));
    }
}
