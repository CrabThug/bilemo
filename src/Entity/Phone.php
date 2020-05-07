<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhoneRepository")
 */
class Phone
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"phones_list", "phones_details"})
     */
    private $id;

    /**
     * @Groups({"phones_list", "phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Groups({"phones_list", "phones_details"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Supplier", inversedBy="phone")
     */
    private $supplier;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specification", inversedBy="phone", cascade={"persist", "remove"})
     */
    private $specification;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSupplier(): ?Supplier
    {
        return $this->supplier;
    }

    public function setSupplier(?Supplier $supplier): self
    {
        $this->supplier = $supplier;

        return $this;
    }

    public function getSpecification(): ?Specification
    {
        return $this->specification;
    }

    public function setSpecification(?Specification $specification): self
    {
        $this->specification = $specification;

        return $this;
    }
}
