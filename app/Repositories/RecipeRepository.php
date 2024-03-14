<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class Recipe
{
    public function addRecipe(string $cookingtype, string $recipename, string $time, string $category, string $difficulty, int $idUser): int
    {
        $recipeId = DB::table("recipes")->insertGetId([
            "recipename" => $recipename,
            "time" => $time,
            "cookingtype" => $cookingtype,
            "category" => $category,
            "difficulty" => $difficulty,
            "id_user" => $idUser,
        ]);

        return $recipeId;
    }


  
     
}