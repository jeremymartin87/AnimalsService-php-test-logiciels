<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../src/AnimalService.php';

class AnimalServiceTest extends TestCase
{
    private $animalService;

    public function setUp(): void
    {
        $this->animalService = new AnimalService();
    }

    public function testGetAnimal()
    {
        $animal = $this->animalService->getAnimal(1);
        $this->assertNotNull($animal);
        $this->assertEquals('Mouton', $animal['nom']);
    }

    public function testSearchAnimal()
    {
        $animals = $this->animalService->searchAnimal('123');
        $this->assertNotEmpty($animals);
        $this->assertCount(1, $animals);
    }

    public function testGetAllAnimals()
    {
        $animals = $this->animalService->getAllAnimals();
        $this->assertNotEmpty($animals);
        $this->assertCount(3, $animals); 
    }

    public function testCreateAnimal()
    {
        $result = $this->animalService->createAnimal('Mouton', 'Herbivore');
        $this->assertTrue($result);
    }

    public function testUpdateAnimal()
    {
        $result = $this->animalService->updateAnimal(1, 'Trex', 'Carnivore');
        $this->assertTrue($result);
    }

    public function testDeleteAnimal()
    {
        $result = $this->animalService->deleteAnimal(2);
        $this->assertTrue($result);
    }

    public function testDeleteAllAnimal()
    {
        $result = $this->animalService->deleteAllAnimal();
        $this->assertInstanceOf(PDOStatement::class, $result);
    }
}
