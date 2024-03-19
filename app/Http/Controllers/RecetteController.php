<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recette;


class RecetteController extends Controller
{
    public function index()
{
    $recettes = Recette::all()->toarray(); // Récupérez toutes les recettes depuis la base de données


    return view('recettes.index', ["recettes" => $recettes]);
}


public function create()
{

    return view('recettes.create');
}

public function store(Request $request)
{
    // Valider les données du formulaire
    $request->validate([
        'titre' => 'required', // Champ 'titre' obligatoire
        'description' => 'required', // Champ 'description' obligatoire (exemple)
    ]);

    // Enregistrer la nouvelle recette dans la base de données
    Recette::create($request->all());
    
    // Rediriger avec un message de succès
    return redirect()->route('recettes.index')
        ->with('success', 'La recette a été ajoutée avec succès.');
}


public function show($id)
{
    $recette = Recette::findOrFail($id); // Récupérez la recette par son ID
    return view('recettes.show', compact('recette'));
}


public function edit($id)
{
    $recette = Recette::findOrFail($id); // Récupérez la recette par son ID
    return view('recettes.edit', compact('recette'));
}


public function update(Request $request, $id)
{
    // Valider les données du formulaire
    $request->validate([
        'titre' => 'required', // Champ 'titre' obligatoire
        'description' => 'required', // Champ 'description' obligatoire (exemple)
    ]);

    // Mettre à jour la recette dans la base de données
    $recette = Recette::findOrFail($id);
    $recette->update($request->all());
    
    // Rediriger avec un message de succès
    return redirect()->route('recettes.index')
        ->with('success', 'La recette a été mise à jour avec succès.');
}

public function destroy($id)
{
    try {
        $recette = Recette::findOrFail($id);
        $recette->destroy();

        return redirect()->route('recettes.index')
            ->with('success', 'La recette a été supprimée avec succès.');
    } catch (\Exception $e) {
        return redirect()->route('recettes.index')
            ->with('error', 'Une erreur s\'est produite lors de la suppression de la recette.');
    }
}

}
