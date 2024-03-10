<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;

class Favorite
{
    public function addFavorite(int $idRecette, int $idUtilisateur): int
    {
        $favoriId = DB::table("favorites")->insertGetId([
            "id_recipe" => $idRecette,
            "id_user" => $idUtilisateur,
        ]);

        return $favoriId;
    }
}
