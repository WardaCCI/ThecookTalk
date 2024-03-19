<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;

    protected $table = 'recette'; // Nom de la table associée

    protected $fillable = [ // Champs remplissables
        'nom_recette',
        'duree_recette',
        'type_cuisson',
        'caracteristique_plat',
        'difficulte',
        'id_utilisateur',
    ];

    public function utilisateur() // Relation avec la table 'utilisateurs'
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }

    public function scopeRecentes($query) // Méthode personnalisée pour récupérer les recettes les plus récentes
    {
        return $query->orderBy('created_at', 'desc');
    }
}
