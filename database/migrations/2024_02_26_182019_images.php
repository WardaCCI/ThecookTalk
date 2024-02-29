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
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id_images');
            $table->unsignedBigInteger('id_recette');
            $table->binary('images')->notNullable(); // Colonne pour stocker le contenu de l'image en tant que BLOB

            $table->foreign('id_recette')->references('id_recette')->on('recette');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};