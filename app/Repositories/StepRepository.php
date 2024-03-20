<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class StepRepository
{
    public function addStep(string $description, int $idRecette): int
    {
        $etapeId = DB::table("steps")->insertGetId([
            "description" => $description,
            "id_recipe" => $idRecette,
        ]);

        return $etapeId;
    }
}
