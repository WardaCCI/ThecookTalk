<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Ajoutez cette ligne pour utiliser la classe Request
use App\Repository\Recipe; // Assurez-vous d'importer la classe du référentiel RecipeRepository ou ajustez selon votre structure de projet
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
  

    // Assurez-vous que $repository est correctement initialisé
    protected $repository;
    
    
    public function __construct(Recipe $recipeRepository)
    {
        $this->repository = $recipeRepository;
    }
    public function insertRecipe(Request $request)
    {
        // Définissez vos règles de validation ici
        $rules = [
            'recipename' => 'required|unique:recipes',
            'time' => 'required',
            'cookingtype' => 'required|in:four,barbeque,poele,vapeur,sans cuisson', // Correction ici
            'category' => 'required|in:entree,plat,dessert,boisson',
            'difficulty' => 'required|in:difficile,facile,moyen',
            'id_user' => 'required|exists:users,id',
        ];

        // Définissez vos messages personnalisés ici
        $messages = [
            'recipename.required' => 'Le nom de la recette est requis.',
            'recipename.unique' => 'Le nom de la recette existe déjà.',
            'cookingtype.required' => 'Le type de cuisson de la recette est requis.',
            'category.required' => 'Le type de plat de la recette est requis.',
            'difficulty.required' => 'Le niveau de difficulté de la recette est requis.',
            'time.required' => 'Le temps de cuisson est requis.',
            // Ajoutez d'autres messages pour les autres champs
        ];

        // Validez les données avec la fonction validate
        $validatedData = $request->validate( $rules, $messages);

        // Si la validation réussit, insérez les données dans la base de données
        $recipe = $this->repository->addRecipe([
            "cookingtype" => $validatedData['cookingtype'],
            "recipename" => $validatedData['recipename'],
            "time" =>$validatedData['time'],
            "category" => $validatedData['category'],
            "difficulty" => $validatedData['difficulty'],
            "id_user" =>$validatedData['id_user']]
        );

        return $recipe;
    }
}