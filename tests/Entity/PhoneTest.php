<?php

namespace App\Tests\Entity;

use App\Entity\Phone;
use App\Entity\Specification;
use App\Entity\Supplier;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    private $phone;

    protected function setUp(): void
    {
        $this->phone = new Phone();
    }

    public function testGetId()
    {
        $this->assertNull($this->phone->getId());
    }

    public function testGetName()
    {
        $this->phone->setName('test');
        $this->assertSame('test', $this->phone->getName());
    }

    public function testGetSupplier()
    {
        $supplier = new Supplier();
        $this->phone->setSupplier($supplier);
        $this->assertNotEmpty($this->phone->getSupplier());
    }

    public function testGetSpecification()
    {
        $specification = new Specification();
        $this->phone->setSpecification($specification);
        $this->assertNotEmpty($this->phone->getSpecification());
    }
}
