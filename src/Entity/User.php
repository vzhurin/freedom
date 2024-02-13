<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute as Serializer;

#[ORM\Entity]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: Types::INTEGER, options: ['unsigned' => true])]
    #[ORM\GeneratedValue]
    #[Serializer\Groups(['product.with_store_and_user', 'product.with_user', 'store.with_user'])]
    public int $id;

    #[ORM\Column(type: Types::STRING, length: 255)]
    #[Serializer\Groups(['product.with_store_and_user', 'product.with_user', 'store.with_user'])]
    #[Serializer\SerializedName('first_name')]
    public string $firstName;

    #[ORM\Column(type: Types::STRING, length: 255)]
    #[Serializer\Groups(['product.with_store_and_user', 'product.with_user', 'store.with_user'])]
    public string $surname;

    public function __construct(string $firstName, string $surname)
    {
        $this->firstName = $firstName;
        $this->surname = $surname;
    }
}
