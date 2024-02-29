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
        Schema::create('quantite', function (Blueprint $table) {
            $table->bigIncrements('id_quantite');
            $table->string('unite', 5)->notNullable();
            $table->integer('quantite')->notNullable();
            $table->unsignedBigInteger('id_ingredient');
            $table->unsignedBigInteger('id_recette');
            
            $table->foreign('id_ingredient')->references('id_ingredient')->on('ingredient');
            $table->foreign('id_recette')->references('id_recette')->on('recette');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quantite');
    }
};