<?php

namespace App\Data\Recipe;

use App\Data\DataService;

class RecipeService extends DataService
{
    private $data;
    private $filename = __DIR__ . "\data.json";

    public function __construct()
    {
        $jsonContent = $this->readDataFile($this->filename);
        $this->data = $this->prepareData($jsonContent);
    }

    /**
     * Get recipe collection by defining ingredient titles
     * @param string[] $ingredients array of ingredient title
     * @return RecipeModel[] array of recipe
     */
    public function getRecipesByIngredients(array $ingredients) {
        return $this->data->findRecipesByIngredients($ingredients);
    }

    /**
     * Convert json data to app model
     * @param object $jsonContent parsed json object
     * @return RecipeCollectionModel
     */
    private function prepareData($jsonContent)
    {
        $receiptCollection = new RecipeCollectionModel();
        foreach ($jsonContent->recipes as $item) {
            $receiptCollection->addRecipe(new RecipeModel(
                $item->title,
                $item->ingredients,
            ));
        }
        return $receiptCollection;
    }
}
