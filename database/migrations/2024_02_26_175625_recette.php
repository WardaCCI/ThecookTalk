<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recette', function (Blueprint $table) {
            $table->bigIncrements('id_recette');
            $table->string('nom_recette', 50)->notNullable();
            $table->integer('duree_recette')->notNullable();
            $table->string('type_cuisson', 50)->notNullable();
            $table->string('caracteristique_plat', 50)->notNullable();
            $table->enum('difficulte', ['difficile', 'facile', 'moyen'])->notNullable();
            $table->unsignedBigInteger('id_utilisateur');
            
            $table->foreign('id_utilisateur')->references('id_utilisateur')->on('utilisateurs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recette');
    }
};