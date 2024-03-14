<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RecipeRepository;
use App\Repositories\StepRepository;
use App\Repositories\IngredientRepository;
use App\Repositories\ImagesRepository;
use App\Repositories\QuantityRepository;
use App\Repositories\UnitsRepository;
use Exception;

class Controller extends BaseController
{
   
    protected $recipeId;
  

    public function __construct(RecipeRepository $recipeRepository, StepRepository $stepRepository,IngredientRepository $ingredientRepository, ImagesRepository $imagesRepository,QuantityRepository $quantityRepository,UnitsRepository $unitsRepository )
    {
        $this->recipeRepository = $recipeRepository;
        $this->stepRepository =  $stepRepository;
        $this->ingredientRepository =  $ingredientRepository;
        $this->imagesRepository =  $imagesRepository;
        $this->quantityRepository =  $quantityRepository;
        $this->unitsRepository =  $quantityRepository;
    }

    public function insertRecipe(Request $request)
    {
        $rules = [
            'recipename' => 'required|unique:recipes',
            'time' => 'required',
            'cookingtype' => 'required|in:four,barbeque,poele,vapeur,sans cuisson',
            'category' => 'required|in:entree,plat,dessert,boisson',
            'difficulty' => 'required|in:difficile,facile,moyen',
            'id_user' => 'required',
        ];

        $messages = [
            'recipename.required' => 'Le nom de la recette est requis.',
            'recipename.unique' => 'Le nom de la recette existe déjà.',
            'cookingtype.required' => 'Le type de cuisson de la recette est requis.',
            'category.required' => 'Le type de plat de la recette est requis.',
            'difficulty.required' => 'Le niveau de difficulté de la recette est requis.',
            'time.required' => 'Le temps de cuisson est requis.',
            'id_user.required' => 'L\'id user est requis.',
        ];

        $validatedData = $request->validate($rules, $messages);

        try {
            $cookingtype = $validatedData['cookingtype'];
            $recipename = $validatedData['recipename'];
            $time = $validatedData['time'];
            $category = $validatedData['category'];
            $difficulty = $validatedData['difficulty'];
            $id_user = $validatedData['id_user'];

            $recipeId = $this->recipeRepository->addRecipe([
                "cookingtype" => $cookingtype,
                "recipename" => $recipename,
                "time" => $time,
                "category" => $category,
                "difficulty" => $difficulty,
                "id_user" => $id_user
            ]);



              // Insertion des étapes
              $this->insertSteps($request);

              // Insertion des ingrédients
              $this->insertIngredients($request);
  
              // Insertion des images
              $this->insertImages($request );
  
              // Insertion des quantités
              $this->insertQuantities($request);

               // Insertion des units
               $this->insertUnits($request);
  

            
            return redirect()->route('dashboard.show');
        } catch (Exception $exception) {
            return redirect()->back()->withInput()->withErrors("La recette n'est pas ajoutée");
        }
    }

    public function insertSteps(Request $request)
    {
        $rules = [
            'recipe_id' => 'required|exists:recipes,id',
            'steps.*.description' => 'required',
        ];

        $messages = [
            'recipe_id.required' => 'L\'ID de la recette est requis.',
            'recipe_id.exists' => 'L\'ID de la recette spécifiée n\'existe pas.',
            'steps.*.description.required' => 'La description de l\'étape est requise.',
        ];

        $validatedData = $request->validate($rules, $messages);

        try {
            $recipeId = $validatedData['recipe_id'];
            $steps = $validatedData['steps'];

            foreach ($steps as $step) {
                $this->stepRepository->addStep($recipeId, $step['description']);
            }
        } catch (Exception $exception) {
            return redirect()->back()->withInput()->withErrors("Erreur lors de l'ajout des étapes");
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

        try {
            $ingredients = $validatedData['ingredients'];

            foreach ($ingredients as $ingredient) {
                $this->ingredientRepository->addIngredient($ingredient['name'], $ingredient['calorie']);
            }
        } catch (Exception $exception) {
            return redirect()->back()->withInput()->withErrors("Erreur lors de l'ajout des ingrédients");
        }
    }

    public function insertImages(Request $request)
    {
        $rules = [
            'images.*'  => 'required',
            'recipe_id' => 'required|exists:recipes,id',
        ];

        $messages = [
            'recipe_id.required' => 'L\'ID de la recette est requis.',
            'recipe_id.exists' => 'L\'ID de la recette spécifiée n\'existe pas.',
            'images.*.image.required' => 'L\'image est requis.',
        ];

        $validatedData = $request->validate($rules, $messages);

        try {

     

            $recipeId = $validatedData['recipe_id'];
            $images = $request->file('images');
            $path = 'uploads/imagesRecipe/';
    
            foreach ($images as $image) {
                $extension = $image->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $image->move($path, $filename);
                $this->imagesRepository->addImage($path . $filename, $recipeId); // Enregistrer le chemin complet de l'image
            }
        } catch (Exception $exception) {
            return redirect()->back()->withInput()->withErrors("Erreur lors de l'ajout des images");
        }
    }

    public function insertUnits(Request $request)
{
    $rules = [
        'units.*.unit' => 'required',
    ];

    $messages = [
        'units.*.unit.required' => 'Le nom de l\'unité est requis.',
    ];

    $validatedData = $request->validate($rules, $messages);

    try {
        $units = $validatedData['units'];

        foreach ($units as $unit) {
            $this->unitRepository->addUnit($unit['unit']);
        }
    } catch (Exception $exception) {
        return redirect()->back()->withInput()->withErrors("Erreur lors de l'ajout des unités");
    }
}

public function insertQuantities(Request $request)
{
    $rules = [
        'quantities.*.quantity' => 'required|integer',
        'quantities.*.unit_id' => 'required|exists:units,id',
        'ingredient_id' => 'required|exists:ingredients,id',
        'recipe_id' => 'required|exists:recipes,id',
    ];

    $messages = [
        'quantities.*.quantity.required' => 'La quantité est requise.',
        'quantities.*.quantity.integer' => 'La quantité doit être un entier.',
        'quantities.*.unit_id.required' => "L'ID de l'unité est requis.",
        'quantities.*.unit_id.exists' => "L'ID de l'unité spécifiée n'existe pas.",
        'ingredient_id.required' => "L'ID de l'ingrédient est requis.",
        'ingredient_id.exists' => "L'ID de l'ingrédient spécifié n'existe pas.",
        'recipe_id.required' => "L'ID de la recette est requis.",
        'recipe_id.exists' => "L'ID de la recette spécifiée n'existe pas.",
    ];

    $validatedData = $request->validate($rules, $messages);

    try {
        $recipeId = $validatedData['recipe_id'];
        $quantities = $validatedData['quantities'];

        foreach ($quantities as $quantity) {
            $this->quantiteRepository->ajouterQuantite($quantity['quantity'], $quantity['unit_id'], $validatedData['ingredient_id'], $recipeId);
        }
    } catch (Exception $exception) {
        return redirect()->back()->withInput()->withErrors("Erreur lors de l'ajout des quantités");
    }
}


}


