<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;

class Images
{
    public function addImage(string $cheminImage, int $idRecette): int
    {
        $imageId = DB::table("images")->insertGetId([
            "image" => $cheminImage, 
            "id_recipe" => $idRecette,
        ]);

        return $imageId;
    }
}
