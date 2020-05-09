<?php

namespace App\Tests\Entity;

use App\Entity\Phone;
use App\Entity\Supplier;
use PHPUnit\Framework\TestCase;

class SupplierTest extends TestCase
{
    private $supplier;

    protected function setUp(): void
    {
        $this->supplier = new Supplier();
    }

    public function testGetId()
    {
        $this->assertNull($this->supplier->getId());

    }

    public function testGetName()
    {
        $this->supplier->setName('test');
        $this->assertSame('test', $this->supplier->getName());
    }

    public function testGetPhone()
    {
        $phone = new Phone();
        $this->supplier->addPhone($phone);
        $this->assertNotEmpty($this->supplier->getPhone());
        $this->supplier->removePhone($phone);
        $this->assertEmpty($this->supplier->getPhone());
    }
}
