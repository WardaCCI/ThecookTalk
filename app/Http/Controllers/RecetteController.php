<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recette;
use App\Models\Ingredient;
use App\Models\Step;
use App\Models\Image;

class RecetteController extends Controller
{
    public function index()
    {
        $recettes = Recette::all();
        return view('recettes.index', compact('recettes'));
    }

    public function create()
    {
        return view('recettes.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'recipe_name' => 'required',
            'recipe_category' => 'required',
            'difficulty' => 'required',
            'preparation_time' => 'required',
            'cooking_type' => 'required',
            'ingredient' => 'required|array|min:1',
            'ingredient.*' => 'required|array|min:3',
            'ingredient.*.name' => 'required',
            'ingredient.*.quantity' => 'required|numeric',
            'ingredient.*.unit' => 'required',
            'step' => 'required|array|min:1',
            'step.*' => 'required',
            'image' => 'required|array|min:1',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Enregistrer la nouvelle recette dans la base de données
        $recipe = new Recette();
        $recipe->name = $request->input('recipe_name');
        $recipe->category = $request->input('recipe_category');
        $recipe->difficulty = $request->input('difficulty');
        $recipe->preparation_time = $request->input('preparation_time');
        $recipe->cooking_type = $request->input('cooking_type');
        $recipe->save();

        // Ajouter les ingrédients
        foreach ($request->input('ingredient') as $ingredientData) {
            $ingredient = new Ingredient();
            $ingredient->recipe_id = $recipe->id;
            $ingredient->name = $ingredientData['name'];
            $ingredient->quantity = $ingredientData['quantity'];
            $ingredient->unit = $ingredientData['unit'];
            $ingredient->save();
        }

        // Ajouter les étapes
        foreach ($request->input('step') as $stepDescription) {
            $step = new Step();
            $step->recipe_id = $recipe->id;
            $step->description = $stepDescription;
            $step->save();
        }

        // Ajouter les images
        foreach ($request->file('image') as $image) {
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('public/recipes', $imageName);

            $newImage = new Image();
            $newImage->recipe_id = $recipe->id;
            $newImage->name = $imageName;
            $newImage->save();
        }

        // Rediriger avec un message de succès
        return redirect()->route('recettes.index')->with('success', 'La recette a été ajoutée avec succès.');
    }

    public function show($id)
    {
        $recette = Recette::findOrFail($id);
        return view('recettes.show', compact('recette'));
    }

    public function edit($id)
    {
        $recette = Recette::findOrFail($id);
        return view('recettes.edit', compact('recette'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'recipe_name' => 'required',
            'recipe_category' => 'required',
            'difficulty' => 'required',
            'preparation_time' => 'required',
            'cooking_type' => 'required',
            'ingredient.*' => 'required',
            'ingredient_quantity.*' => 'required|numeric',
            'ingredient_unit.*' => 'required',
            'step.*' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mettre à jour la recette dans la base de données
        $recette = Recette::findOrFail($id);
        $recette->update($request->all());

        // Rediriger avec un message de succès
        return redirect()->route('recettes.index')->with('success', 'La recette a été mise à jour avec succès.');
    }

    public function destroy($id)
    {
        try {
            $recette = Recette::findOrFail($id);
            $recette->delete(); // Correction de la suppression

            return redirect()->route('recettes.index')
                ->with('success', 'La recette a été supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('recettes.index')
                ->with('error', 'Une erreur s\'est produite lors de la suppression de la recette.');
        }
    }
}
