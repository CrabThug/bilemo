<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"users_list", "users_details"})
     */
    private $id;

    /**
     * @Groups({"users_list", "users_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @Groups({"users_list", "users_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @Groups({"users_list", "users_details"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="users")
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
