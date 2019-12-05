<?php
namespace App\Tests;

use App\Data\Ingredient\IngredientService;
use PHPUnit\Framework\TestCase;

class IngredientTest extends TestCase {
    protected $service;

    protected function setUp() {
        $this->service = new IngredientService();
    }

    public function testIsDataLoaded() {
        $this->assertIsObject($this->service);
    }
}