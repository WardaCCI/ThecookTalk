<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ImagesRepository
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
