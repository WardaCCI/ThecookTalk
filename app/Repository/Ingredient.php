<?php
namespace App\Repository;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class Ingredient {
      public function addIngredient(int $recipeId, string $name, string $unit): void
    {
        // Vérifiez d'abord si l'ingrédient existe déjà pour cette recette
        $existingIngredient = DB::table('ingredients')
            ->where('id_recipe', $recipeId)
            ->where('name', $name)
            ->first();

        // Ajoutez l'ingrédient uniquement s'il n'existe pas déjà
        if (!$existingIngredient) {
            DB::table('ingredients')->insert([
                'id_recipe' => $recipeId,
                'name' => $name,
                'unit' => $unit,
            ]);
        }
        
    }
} 