<?php

namespace App\Data\Recipe;

class RecipeModel {
    public $title;
    public $ingredients;

    public function __construct($title, $ingredients)
    {
        $this->title = $title;
        $this->ingredients = $ingredients;
    }
}