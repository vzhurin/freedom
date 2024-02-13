<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute as Serializer;

#[ORM\Entity]
class Store
{
    #[ORM\Id]
    #[ORM\Column(type: Types::INTEGER, options: ['unsigned' => true])]
    #[ORM\GeneratedValue]
    #[Serializer\Groups(['store.with_user', 'product.with_store_and_user'])]
    public int $id;

    #[ORM\Column(type: Types::STRING, length: 255)]
    #[Serializer\Groups(['store.with_user', 'product.with_store_and_user'])]
    public string $title;

    #[ORM\ManyToOne(fetch: 'EAGER')]
    #[Serializer\Groups(['store.with_user', 'product.with_store_and_user'])]
    public User $user;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    public \DateTimeImmutable $createdAt;

    public function __construct(string $title, User $user, ?\DateTimeImmutable $createdAt = null)
    {
        $this->title = $title;
        $this->user = $user;
        $this->createdAt = $createdAt ?? new \DateTimeImmutable();
    }
}
