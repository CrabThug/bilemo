<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpecificationRepository")
 */
class Specification
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $height;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $width;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $thick;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $weight;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $resolution;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $diagonal;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $lux;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $photo_sensor;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $front_photo_sensor;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $battery_capacity;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $internal_memory;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $external_memory;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $nfc;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $dual_slim;

    /**
     * @Groups({"phones_details"})
     * @ORM\Column(type="string", length=255)
     */
    private $network;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Phone", mappedBy="specification", cascade={"persist", "remove"})
     */
    private $phone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeight(): ?string
    {
        return $this->height;
    }

    public function setHeight(string $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?string
    {
        return $this->width;
    }

    public function setWidth(string $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getThick(): ?string
    {
        return $this->thick;
    }

    public function setThick(string $thick): self
    {
        $this->thick = $thick;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getResolution(): ?string
    {
        return $this->resolution;
    }

    public function setResolution(string $resolution): self
    {
        $this->resolution = $resolution;

        return $this;
    }

    public function getDiagonal(): ?string
    {
        return $this->diagonal;
    }

    public function setDiagonal(string $diagonal): self
    {
        $this->diagonal = $diagonal;

        return $this;
    }

    public function getLux(): ?string
    {
        return $this->lux;
    }

    public function setLux(string $lux): self
    {
        $this->lux = $lux;

        return $this;
    }

    public function getPhotoSensor(): ?string
    {
        return $this->photo_sensor;
    }

    public function setPhotoSensor(string $photo_sensor): self
    {
        $this->photo_sensor = $photo_sensor;

        return $this;
    }

    public function getFrontPhotoSensor(): ?string
    {
        return $this->front_photo_sensor;
    }

    public function setFrontPhotoSensor(string $front_photo_sensor): self
    {
        $this->front_photo_sensor = $front_photo_sensor;

        return $this;
    }

    public function getBatteryCapacity(): ?string
    {
        return $this->battery_capacity;
    }

    public function setBatteryCapacity(string $battery_capacity): self
    {
        $this->battery_capacity = $battery_capacity;

        return $this;
    }

    public function getInternalMemory(): ?string
    {
        return $this->internal_memory;
    }

    public function setInternalMemory(string $internal_memory): self
    {
        $this->internal_memory = $internal_memory;

        return $this;
    }

    public function getExternalMemory(): ?string
    {
        return $this->external_memory;
    }

    public function setExternalMemory(string $external_memory): self
    {
        $this->external_memory = $external_memory;

        return $this;
    }

    public function getNfc(): ?string
    {
        return $this->nfc;
    }

    public function setNfc(string $nfc): self
    {
        $this->nfc = $nfc;

        return $this;
    }

    public function getDualSlim(): ?string
    {
        return $this->dual_slim;
    }

    public function setDualSlim(string $dual_slim): self
    {
        $this->dual_slim = $dual_slim;

        return $this;
    }

    public function getNetwork(): ?string
    {
        return $this->network;
    }

    public function setNetwork(string $network): self
    {
        $this->network = $network;

        return $this;
    }

    public function getPhone(): ?Phone
    {
        return $this->phone;
    }

    public function setPhone(?Phone $phone): self
    {
        $this->phone = $phone;

        // set (or unset) the owning side of the relation if necessary
        $newSpecification = null === $phone ? null : $this;
        if ($phone->getSpecification() !== $newSpecification) {
            $phone->setSpecification($newSpecification);
        }

        return $this;
    }
}
