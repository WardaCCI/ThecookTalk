<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RecetteMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_recette_table_is_created()
    {
        // Exécutez la migration
        $this->artisan('migrate');

        // Vérifiez que la table "recette" existe dans la base de données
        $this->assertTrue(Schema::hasTable('recette'));
    }
}
