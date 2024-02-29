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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->bigIncrements('id_utilisateur');
            $table->string('nom_utilisateur', 15)->notNullable();
            $table->string('prenom_utilisateur', 15)->notNullable();
            $table->string('ville', 20)->notNullable();
            $table->string('pays', 20)->notNullable();
            $table->integer('annee_naissance')->unsigned()->notNullable(); // Utilisation de 'integer' pour stocker l'année
            $table->integer('mois_naissance')->unsigned()->notNullable(); // Utilisation de 'integer' pour stocker le mois
            $table->string('numero_telephone', 10)->notNullable();
            $table->string('adresse_email', 50)->unique()->notNullable();
            $table->string('mot_de_passe')->notNullable();
            $table->binary('photo_utilisateur')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};