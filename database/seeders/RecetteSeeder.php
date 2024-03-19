<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecetteSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('recette')->insert([
            'nom_recette' => 'Ma recette',
            'duree_recette' => 30,
            'type_cuisson' => 'Four',
            'caracteristique_plat' => 'Plat principal',
            'difficulte' => 'moyen',
            'id_utilisateur' => 1, // Remplacez par l'ID de l'utilisateur
        ]);
    }
}
