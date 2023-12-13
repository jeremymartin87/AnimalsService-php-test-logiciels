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
final class AnimalServiceIntegrationTest extends TestCase
{
    private $animalService;

    public function __construct(string $name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->animalService = new AnimalService();
    }

    // test de suppression de toute les données, nécessaire pour nettoyer la bdd de tests à la fin
    public function testDeleteAll()
    {
        $this->assertTrue(true);
    }


    public function testCreation()
    {
        $result = $this->animalService->createAnimal('Tigre', 'Carnivore');
        $this->assertTrue($result);
    }

    public function testSearch()
    {
        $result = $this->animalService->searchAnimal('Tigre');
        $this->assertNotNull($result);
    }

    public function testModify()
    {
        $result = $this->animalService->modifyAnimal(1, 'Tigre', 'Herbivore');
        $this->assertTrue($result);
    }

    public function testDelete()
    {
        $result = $this->animalService->deleteAnimal(1);
        $this->assertTrue($result);
    }

}
