<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Ajoutez cette ligne pour utiliser la classe Request
use App\Repository\Recipe; // Assurez-vous d'importer la classe du référentiel RecipeRepository ou ajustez selon votre structure de projet
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Repository\Step;
use App\Repository\Ingredient;
use App\Repository\Images;
use App\Repository\Quantity;

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
        $recipeId = $this->repository->addRecipe([
            "cookingtype" => $validatedData['cookingtype'],
            "recipename" => $validatedData['recipename'],
            "time" =>$validatedData['time'],
            "category" => $validatedData['category'],
            "difficulty" => $validatedData['difficulty'],
            "id_user" =>$validatedData['id_user']]
        );

        return $recipeId;
    }



    public function insertSteps(Request $request)
    {
        // Définissez vos règles de validation ici
        $rules = [
            'recipe_id' => 'required|exists:recipes,id',
            'steps.*.description' => 'required',
        ];
        
        // Définissez vos messages personnalisés ici
        $messages = [
            'recipe_id.required' => 'L\'ID de la recette est requis.',
            'recipe_id.exists' => 'L\'ID de la recette spécifiée n\'existe pas.',
            'steps.*.description.required' => 'La description de l\'étape est requise.',
        ];
        
        // Validez les données avec la fonction validate
        $validatedData = $request->validate($rules, $messages);
        
        // Récupérez l'ID de la recette depuis les données validées
        $recipeId = $validatedData['recipe_id'];
        
        // Si la validation réussit, insérez les données dans la base de données
        $steps = $validatedData['steps'];
        
        foreach ($steps as $step) {
            $this->repository->addStep($recipeId, $step['description']);
        }
    }


    public function insertIngredients(Request $request)
    {
        $rules = [
            'ingredients.*.name' => 'required',
            'ingredients.*.calorie' => 'required',
            
        ];

        $messages = [
            'ingredients.*.name.required' => 'Le nom de l\'ingrédient est requis.',
            'ingredients.*.calorie.required' => 'Les calories de l\'ingrédient est requise.',
        ];

        $validatedData = $request->validate($rules, $messages);

       
        $ingredients = $validatedData['ingredients'];

        foreach ($ingredients as $ingredient) {
            $this->recipeRepository->addIngredient( $ingredient['name'], $ingredient['calorie']);
        }

        // Retournez une réponse appropriée, par exemple, une réponse JSON ou une redirection
    }

    public function insertImages(Request $request)
    {
        $rules = [
          
            'images.*.image' => 'required',
            'recipe_id' => 'required|exists:recipes,id',
        ];
    
        $messages = [
            'recipe_id.required' => 'L\'ID de la recette est requis.',
            'recipe_id.exists' => 'L\'ID de la recette spécifiée n\'existe pas.',
            'images.*.image.required' => 'L\'image est requis.',
        ];
    
        $validatedData = $request->validate($rules, $messages);
    
        $recipeId = $validatedData['recipe_id'];
        $images = $validatedData['images'];
    
        foreach ($images as $image) {
            $this->imageRepository->addImage($image['image'], $recipeId);
        }
    
        // Retournez une réponse appropriée, par exemple, une réponse JSON ou une redirection
    }
    

    public function insertQuantities(Request $request)
    {
        // Validation des quantités avec ajout de la règle pour l'id_recipe
        $rules = [
            'id_ingredient' => 'required|exists:ingredients,id',
            'quantities.*.unit' => 'required|string|max:5',
            'quantities.*.quantity' => 'required|integer',
            'recipe_id' => 'required|exists:recipes,id',
            
        ];
    
        // Messages personnalisés pour les quantités
        $messages = [
            'id_ingredient.required' => 'L\'id de l\'ingrédient est requis.',
            'id_ingredient.exists' => 'L\'id de l\'ingrédient spécifié n\'existe pas.',
            'quantities.*.unit.required' => 'L\'unité de la quantité est requise.',
            'quantities.*.unit.max' => 'L\'unité de la quantité ne doit pas dépasser 5 caractères.',
            'quantities.*.quantity.required' => 'La quantité est requise.',
            'quantities.*.quantity.integer' => 'La quantité doit être un nombre entier.',
            'recipe_id.required' => 'L\'ID de la recette est requis.',
            'recipe_id.exists' => 'L\'ID de la recette spécifiée n\'existe pas.',
        ];
    
        // Validez les données avec la fonction validate
        $validatedData = $request->validate($rules, $messages);
    
        // Si la validation réussit, insérez les données dans la base de données
        $ingredientId = $validatedData['id_ingredient'];
        $recipeId = $validatedData['recipe_id'];
        $quantities = $validatedData['quantities'];
    
        foreach ($quantities as $quantity) {
            $this->repository->addQuantity($recipeId, $ingredientId, $quantity['unit'], $quantity['quantity']);
        }
    
        // Retournez une réponse ou redirigez l'utilisateur vers une autre page
    }




}





