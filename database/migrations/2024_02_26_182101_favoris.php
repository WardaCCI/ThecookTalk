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
        Schema::create('favoris', function (Blueprint $table) {
            $table->bigIncrements('id_favoris');
            $table->unsignedBigInteger('id_recette');
            $table->unsignedBigInteger('id_utilisateur');
            
            $table->foreign('id_recette')->references('id_recette')->on('recette');
            $table->foreign('id_utilisateur')->references('id_utilisateur')->on('utilisateurs');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favoris');
    }
};