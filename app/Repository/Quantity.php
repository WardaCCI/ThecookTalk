<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;

class Quantite
{
    public function ajouterQuantite(string $unite, int $quantite, int $idIngredient, int $idRecette): int
    {
        $quantiteId = DB::table("quantites")->insertGetId([
            "unite" => $unite,
            "quantite" => $quantite,
            "id_ingredient" => $idIngredient,
            "id_recette" => $idRecette,
        ]);

        return $quantiteId;
    }
}
