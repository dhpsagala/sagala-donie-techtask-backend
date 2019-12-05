<?php

namespace App\Data\Ingredient;

use DateTime;

class IngredientModel
{
    public $title;
    public $bestBefore;
    public $useBy;

    public function __construct($title, $bestBefore, $useBy)
    {
        $this->title = $title;
        $this->bestBefore = strtotime($bestBefore);
        $this->useBy = strtotime($useBy);
    }

    public function bestBeforeHasOver()
    {
        $now = date("Y-m-d H:i:s");
        return $now > $this->bestBefore;
    }

    public function useByHasOver()
    {
        $now = date("Y-m-d H:i:s");
        return $now > $this->useBy;
    }
}
