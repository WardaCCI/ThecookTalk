<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
class Units
{
    /**
     * Run the migrations.
     */
    public function addUnit(string $unit): int
    {
         // Vérifiez d'abord si l'ingrédient existe déjà pour cette recette
         $existingUnit = DB::table('units')
         ->where('id_recipe', $recipeId)
         ->where('name', $name)
         ->first();

         if (!$existingUnit) {
            $unitId = DB::table('units')->insertGetId([
            'unit' => $unit,
        ]);
    }
}

}