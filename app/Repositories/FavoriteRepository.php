<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class FavoriteRepository
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
