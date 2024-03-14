<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class Quantite
{
    public function ajouterQuantite(int $quantite, int $idUnite, int $idIngredient, int $idRecette): int
    {
        $quantiteId = DB::table("quantites")->insertGetId([
            "quantity" => $quantite,
            "id_unit" => $idUnite,
            "id_ingredient" => $idIngredient,
            "id_recipe" => $idRecette,
        ]);

        return $quantiteId;
    }
}