<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SupplierRepository")
 */
class Supplier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"phones_list", "phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Phone", mappedBy="supplier")
     */
    private $phone;

    public function __construct()
    {
        $this->phone = new ArrayCollection();
    }

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

    /**
     * @return Collection|Phone[]
     */
    public function getPhone(): Collection
    {
        return $this->phone;
    }

    public function addPhone(Phone $phone): self
    {
        if (!$this->phone->contains($phone)) {
            $this->phone[] = $phone;
            $phone->setSupplier($this);
        }

        return $this;
    }

    public function removePhone(Phone $phone): self
    {
        if ($this->phone->contains($phone)) {
            $this->phone->removeElement($phone);
            // set the owning side to null (unless already changed)
            if ($phone->getSupplier() === $this) {
                $phone->setSupplier(null);
            }
        }

        return $this;
    }
}
