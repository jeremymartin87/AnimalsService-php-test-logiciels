<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../src/AnimalService.php';

/**
 * * @covers invalidInputException
 * @covers \AnimalService
 *
 * @internal
 */
final class AnimalServiceUnitTest extends TestCase {
    private $animalService;

    public function __construct(string $name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->animalService = new AnimalService();
    }

    public function testCreationAnimalWithoutAnyText() {
        $this->expectException(InvalidInputException::class);
        $this->animalService->createAnimal('', '');
    }

    public function testCreationAnimalWithoutName() {
        $this->expectException(InvalidInputException::class);
        $this->animalService->createAnimal('', 'Herbivore');
    }

    public function testCreationAnimalWithoutNumber() {
        $this->expexpectException(InvalidInputException::class);
        $this->animalService->createAnimal('Mouton', '');
    }

    public function testSearchAnimalWithNumber() {
        $result = $this->animalService->searchAnimalByNumber(123);
        $this->assertNull($result);
    }

    public function testModifyAnimalWithInvalidId() {
        $this->expectException(InvalidInputException::class);
        $this->animalService->modifyAnimal(0, 'Trex', 'Carnivore');
    }

    public function testDeleteAnimalWithTextAsId() {
        $this->expectException(InvalidInputException::class);
        $this->animalService->deleteAnimal('JeSaisPas');
    }





    public function testModifyAnimalWithoutName()
    {
        $this->expectException(InvalidInputException::class);
        $this->animalService->modifyAnimal(1, '', 'Herbivore');
    }

    public function testModifyAnimalWithoutIdentification()
    {
        $this->expectException(InvalidInputException::class);
        $this->animalService->modifyAnimal(1, 'Mouton');
    }

    public function testModifyAnimalWithEmptyNumber()
    {
        $this->expectException(InvalidInputException::class);
        $this->animalService->modifyAnimal(1, 'Mouton','');
    }

    public function testDeleteAnimalWithNegativeId()
    {
        $this->expectException(InvalidInputException::class);
        $this->animalService->deleteAnimal(-5);
    }

    public function testDeleteAnimalWithoutId()
    {
        $this->expectException(InvalidInputException::class);
        $this->animalService->deleteAnimal();
    }

    public function testSearchAnimalWithEmptyName()
    {
        $this->expectException(InvalidInputException::class);
        $this->animalService->searchAnimal('');
    }

}
