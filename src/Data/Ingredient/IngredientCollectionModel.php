<?php

namespace App\Data\Ingredient;

class IngredientCollectionModel
{
    public $ingredients;

    public function __construct()
    {
        $this->ingredients = [];
    }

    public function addIngredient($ingredient)
    {
        array_push($this->ingredients, $ingredient);
    }

    public function getIngredient(string $ingredient)
    {
        foreach ($this->ingredients as $item) {
            if ($item->title == $ingredient)
                return $item;
        }
        return null;
    }

    public function getIngredients(array $ingredients) : array
    {
        $result = [];
        foreach ($this->ingredients as $item) {
            if (in_array($item->title, $ingredients))
                $result[] = $item;
        }
        return $result;
    }
}
