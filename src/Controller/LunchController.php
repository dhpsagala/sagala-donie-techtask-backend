<?php

namespace App\Controller;

use App\Data\Ingredient\IngredientService;
use App\Data\Recipe\RecipeService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LunchController {

    public function Index(Request $request) {
        $recipeService = new RecipeService();
        $ingredientService = new IngredientService();

        $body = json_decode($request->getContent());
        $ingredientsData = $ingredientService->getUsableIngredientsByTitle($body->ingredients);
        $recipes = $recipeService->getRecipesByIngredients($ingredientsData);
        return new JsonResponse($recipes);
    }
}