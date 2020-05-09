<?php

namespace App\Tests\Entity;

use App\Entity\Phone;
use App\Entity\Specification;
use PHPUnit\Framework\TestCase;

class SpecificationTest extends TestCase
{
    private $specification;

    protected function setUp(): void
    {
        $this->specification = new Specification();
    }

    public function testId()
    {
        $this->assertNull($this->specification->getId());
    }

    public function testWeight()
    {
        $this->specification->setWeight('42');
        $this->assertSame('42', $this->specification->getWeight());
    }

    public function testPhone()
    {
        $phone = new Phone();
        $this->specification->setPhone($phone);
        $this->assertNotEmpty($this->specification->getPhone());
    }

    public function testNetwork()
    {
        $this->specification->setNetwork('42');
        $this->assertSame('42', $this->specification->getNetwork());
    }

    public function testGetResolution()
    {
        $this->specification->setResolution('42');
        $this->assertSame('42', $this->specification->getResolution());
    }

    public function testDualSlim()
    {
        $this->specification->setDualSlim(TRUE);
        $this->assertTrue(TRUE, $this->specification->getDualSlim());
    }

    public function testThick()
    {
        $this->specification->setThick('42');
        $this->assertSame('42', $this->specification->getThick());

    }

    public function testPhotoSensor()
    {
        $this->specification->setPhotoSensor('42');
        $this->assertSame('42', $this->specification->getPhotoSensor());
    }

    public function testExternalMemory()
    {
        $this->specification->setExternalMemory('42');
        $this->assertSame('42', $this->specification->getExternalMemory());

    }

    public function testNfc()
    {
        $this->specification->setNfc(TRUE);
        $this->assertTrue(TRUE, $this->specification->getNfc());
    }

    public function testWidth()
    {
        $this->specification->setWidth('42');
        $this->assertSame('42', $this->specification->getWidth());

    }

    public function testDiagonal()
    {
        $this->specification->setDiagonal('42');
        $this->assertSame('42', $this->specification->getDiagonal());
    }

    public function testHeight()
    {
        $this->specification->setHeight('42');
        $this->assertSame('42', $this->specification->getHeight());

    }

    public function testFrontPhotoSensor()
    {
        $this->specification->setFrontPhotoSensor('42');
        $this->assertSame('42', $this->specification->getFrontPhotoSensor());
    }

    public function testInternalMemory()
    {
        $this->specification->setInternalMemory('42');
        $this->assertSame('42', $this->specification->getInternalMemory());

    }

    public function testLux()
    {
        $this->specification->setLux('42');
        $this->assertSame('42', $this->specification->getLux());

    }

    public function testBatteryCapacity()
    {
        $this->specification->setBatteryCapacity('42');
        $this->assertSame('42', $this->specification->getBatteryCapacity());
    }
}
