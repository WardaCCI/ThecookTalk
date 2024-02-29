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
        Schema::create('etape_recette', function (Blueprint $table) {
            $table->bigIncrements('id_etape');
            $table->text('texte_etape');
            $table->unsignedBigInteger('id_recette');
            
            $table->foreign('id_recette')->references('id_recette')->on('recette');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etape_recette');
    }
};
