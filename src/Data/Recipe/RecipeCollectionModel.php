<?php

namespace App\Data\Recipe;

use App\Data\Ingredient\IngredientModel;

class RecipeCollectionModel
{
    public $recipes;

    public function __construct()
    {
        $this->recipes = [];
    }

    /**
     * @param RecipeModel $recipe
     */
    public function addRecipe($recipe)
    {
        array_push($this->recipes, $recipe);
    }

    /**
     * find all recipe by defined ingredient
     * @param IngredientModel $ingredient
     * @return RecipeModel[] recipe collection
     */
    public function findRecipesByIngredient(IngredientModel $ingredient)
    {
        $result = [];
        foreach ($this->recipes as $recipe) {
            if (in_array($ingredient->title, $recipe->ingredients))
                $result[] = $recipe;
        }
        return $result;
    }

    /**
     * find all unique recipe by defined ingredient
     * @param IngredientModel[] $ingredients
     * @return RecipeModel[] recipe collection
     */
    public function findRecipesByIngredients(array $ingredients)
    {
        $recipes = [];
        foreach ($ingredients as $item) {
            $ingredientRecipes = $this->findRecipesByIngredient($item);
            $recipes = array_merge($recipes, $ingredientRecipes);
        }
        return $this->array_distinct($recipes);
    }

    private function array_distinct($array)
    {
        $final = array();
        foreach ($array as $current) {
            if (!in_array($current, $final)) {
                $final[] = $current;
            }
        }
        return $final;
    }
}
