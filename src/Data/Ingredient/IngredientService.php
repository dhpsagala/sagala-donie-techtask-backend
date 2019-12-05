<?php

namespace App\Data\Ingredient;

use App\Data\DataService;

class IngredientService extends DataService
{
    private $data;
    private $filename = __DIR__ . "\data.json";

    public function __construct()
    {
        $jsonContent = $this->readDataFile($this->filename);
        $this->data = $this->prepareData($jsonContent);
    }

    /**
     * Get ingredients by defined titles
     * @param string[] titles of ingredient
     * @return IngredientModel[]
     */
    public function getIngredientsByTitle(array $titles)
    {
        return $this->data->getIngredients($titles);
    }

    /**
     * Get usable ingredients
     */
    public function getUsableIngredientsByTitle(array $titles)
    {
        $ingredients = $this->getIngredientsByTitle($titles);
        $result = [];
        foreach($ingredients as $ingredient){
            if(!$ingredient->useByHasOver())
                $result[] = $ingredient;
        }
        return $result;
    }

    /**
     * Convert json data to app model
     * @param object $jsonContent parsed json object
     * @return IngredientCollectionModel
     */
    private function prepareData($jsonContent)
    {
        $ingredientCollection = new IngredientCollectionModel();
        foreach ($jsonContent->ingredients as $item) {
            $ingredientCollection->addIngredient(new IngredientModel(
                $item->title,
                $item->{"best-before"},
                $item->{"use-by"}
            ));
        }
        return $ingredientCollection;
    }
}
