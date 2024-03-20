<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CommentController 
{
    public function showCommentForm($id)
    {
        $recipeId = $id;
        // Logique pour afficher le formulaire de commentaire
        // Vous pouvez passer des données nécessaires à la vue ici
        return view('recipeView.comment', compact('recipeId'));
    }

    public function storeComment( $id)
    {
        // Logique pour traiter le formulaire de commentaire
        // Enregistrement du commentaire dans la base de données, etc.
        // Redirection vers la page de recette ou autre page appropriée
        return redirect()->route('recipe.show', $id)->with('success', 'Commentaire ajouté avec succès.');
    }

   
}