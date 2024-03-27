<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Repositories\StepRepository;
use App\Repositories\UnitRepository;
use App\Repositories\ImageRepository;
use App\Repositories\RecipeRepository;
use App\Repositories\FavoriteRepository;
use App\Repositories\QuantityRepository;
use App\Repositories\IngredientRepository;
use App\Repositories\StarCommentRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RecipeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $recipeRepository;
    protected $ingredientRepository;
    protected $stepRepository;
    protected $imageRepository;
    protected $unitRepository;
    protected $quantityRepository;
    protected $starcommentRepository;
    protected $favoriteRepository;

    public function __construct(
        RecipeRepository $recipeRepository,
        IngredientRepository $ingredientRepository,
        StepRepository $stepRepository,
        ImageRepository $imageRepository,
        UnitRepository $unitRepository,
        QuantityRepository $quantityRepository,
        StarCommentRepository $starcommentRepository,
        FavoriteRepository $favoriteRepository,
    ) {
        $this->recipeRepository = $recipeRepository;
        $this->ingredientRepository = $ingredientRepository;
        $this->stepRepository = $stepRepository;
        $this->imageRepository = $imageRepository;
        $this->unitRepository = $unitRepository;
        $this->quantityRepository = $quantityRepository;
        $this->starcommentRepository = $starcommentRepository;
        $this->favoriteRepository = $favoriteRepository;
    }

    /** views preview function */

    /**
     * 
     */
    public function showCreateRecipeForm(Request $request)
    {
        if (!$request->session()->has('user')) {
            return redirect()->route('signin.show');
        }

        $ingredients = $this->ingredientRepository->getIngredients();
        $units = $this->unitRepository->getUnits();

        return view('recipes/recipe_create_form', ['ingredients' => $ingredients, 'units' => $units]);
    }

    public function showRecipes()
    {
        try {
            $recipes = $this->recipeRepository->getRecipes();
        } catch (Exception $e) {
            return redirect()->back()->with('warning', "Impossible de charger la page de la recette");
        }

        return view('recipes/recipes', ['recipes' => $recipes, 'recipeimages']);
    }

    /**
     * 
     */
    public function showRecipe(Request $request, int $recipeId)
    {
        $recipe = $this->recipeRepository->getRecipe($recipeId);

        // Vérifiez si $recipe->id_unit est non nulle avant d'appeler getUnit()
        $recipeForUnitname = null;
        if (!is_null($recipe->id_unit)) {
            $recipeForUnitname = $this->unitRepository->getUnit($recipe->id_unit)->unitname;
        }
        $isRecipeInFavorites = $this->favoriteRepository->isRecipeInFavorites($request->session()->get('user')['id'], $recipeId);

        $recipeSteps = $this->stepRepository->getRecipeSteps($recipeId);
        $recipeImages = $this->imageRepository->getRecipeImages($recipeId);
        $recipeQuantities = $this->quantityRepository->getRecipeQuantities($recipeId);
        $recipeStarcomments = $this->starcommentRepository->getStarsComments($recipeId);
        $recipeCommentsCount = $this->starcommentRepository->getCommentsCount($recipeId);
        $recipeAverageStars = $this->starcommentRepository->getAverageStars($recipeId);

        return view('recipes/recipe', [
            'recipe' => $recipe,
            'recipeForUnitname' => $recipeForUnitname,
            'recipeSteps' => $recipeSteps,
            'recipeImages' => $recipeImages,
            'recipeQuantities' => $recipeQuantities,
            'recipeStarscomments' => $recipeStarcomments, // Correction ici
            'recipeCommentsCount' => $recipeCommentsCount,
            'recipeAverageStars' => $recipeAverageStars,
            'isRecipeInFavorites' => $isRecipeInFavorites,
        ]);
    }


    /**
     * 
     */
    public function showUpdateRecipeForm(Request $request, int $userId, int $recipeId)
    {
        if (!$request->session()->has('user')) {
            return redirect()->route('signin.show');
        }

        $ingredients = $this->ingredientRepository->getIngredients();
        $units = $this->unitRepository->getUnits();
        $recipe = $this->recipeRepository->getRecipe($recipeId);

        // Vérifiez si $recipe->id_unit est non nulle avant d'appeler getUnit()
        $recipeUnitname = null;
        if (!is_null($recipe->id_unit)) {
            $recipeUnitname = $this->unitRepository->getUnit($recipe->id_unit)->unitname;
        }

        $recipeImages = $this->imageRepository->getRecipeImages($recipeId);
        $recipeSteps = $this->stepRepository->getRecipeSteps($recipeId);
        $recipeQuantities = $this->quantityRepository->getRecipeQuantities($recipeId);

        return view('recipes/recipe_update_form', [
            'ingredients' => $ingredients,
            'units' => $units,
            'userId' => $userId,
            'recipe' => $recipe,
            'recipeUnitname' => $recipeUnitname,
            'recipeImages' => $recipeImages,
            'recipeSteps' => $recipeSteps,
            'recipeQuantities' => $recipeQuantities,
        ]);
    }


    /** controllers functions */

    /**
     * Add recipe in DB
     */
    public function insertRecipe(Request $request, int $userId)
    {

        $rules = [
            'recipename' => 'required|unique:recipes',
            'time' => 'required',
            'cookingtype' => 'required|in:Four,Barbecue,Poele,Vapeur,Sans cuisson',
            'category' => 'required|in:Entrée,Plat,Dessert,Boisson',
            'difficulty' => 'required|in:Difficile,Facile,Moyen',
            'for' => 'required',
            'id_unit' => 'required|regex:/^\p{L}+$/u',
        ];

        $messages = [
            'recipename.required' => 'Le nom de la recette est requis.',
            'recipename.unique' => 'Le nom de la recette existe déjà.',
            'time.required' => 'Le temps de cuisson est requis.',
            'cookingtype.required' => 'Le type de cuisson de la recette est requis.',
            'category.required' => 'Le type de plat de la recette est requis.',
            'difficulty.required' => 'Le niveau de difficulté de la recette est requis.',
            'for.required' => 'Vous devez renseigner ce champ.',
            'id_unit.required' => "Vous devez renseigner une unité",
            'id_unit.regex' => "Vous devez saisir une unité valide",
        ];

        $validatedData = $request->validate($rules, $messages);
        $validatedData["id_user"] = $userId;

        DB::beginTransaction();

        try {
            $unitId = $this->unitRepository->getUnitId($validatedData["id_unit"]);

            $this->recipeRepository->addRecipe(
                $validatedData['recipename'],
                $validatedData['time'],
                $validatedData['cookingtype'],
                $validatedData['category'],
                $validatedData['difficulty'],
                $validatedData['for'],
                $unitId,
                $validatedData['id_user'],
            );

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('warning', "Impossible de créer la recette");
        }

        return redirect()->route('dashboard.show', ['userId' => $userId]);
    }

    /**
     * 
     */
    public function updateRecipe(Request $request, int $userId, int $recipeId)
    {

        $rules = [
            'recipename' => 'required',
            'time' => 'required',
            'cookingtype' => 'required|in:Four,Barbecue,Poele,Vapeur,Sans cuisson',
            'category' => 'required|in:Entrée,Plat,Dessert,Boisson',
            'difficulty' => 'required|in:Difficile,Facile,Moyen',
            'for' => 'required',
            'id_unit' => 'required|regex:/^\p{L}+$/u',
        ];

        $messages = [
            'recipename.required' => 'Le nom de la recette est requis.',
            'time.required' => 'Le temps de cuisson est requis.',
            'cookingtype.required' => 'Le type de cuisson de la recette est requis.',
            'category.required' => 'Le type de plat de la recette est requis.',
            'difficulty.required' => 'Le niveau de difficulté de la recette est requis.',
            'for.required' => 'Vous devez renseigner ce champ.',
            'id_unit.required' => "Vous devez renseigner une unité",
            'id_unit.regex' => "Vous devez saisir une unité valide",
        ];

        $validatedData = $request->validate($rules, $messages);

        $numberOfChanges = 0;

        DB::beginTransaction();

        try {
            $recipeToUpdate = $this->recipeRepository->getRecipe($recipeId)->toArray();

            $unitId = $this->unitRepository->getUnitId($validatedData['id_unit']);

            $validatedData['id_unit'] = $unitId;

            foreach ($validatedData as $key => $value) {
                if (strcmp($recipeToUpdate[$key], $value) != 0) {
                    $numberOfChanges++;
                }
            }

            if ($numberOfChanges == 0) {
                return redirect()->back()->with('recipe_info', "Aucune modification apportée");
            }

            foreach ($validatedData as $key => $value) {
                if ($value != $recipeToUpdate[$key]) {
                    $this->recipeRepository->updateField($recipeId, $key, $value);
                }
            }

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('recipe_warning', "Impossible de modifier la recette");
        }

        return redirect()->back()->with('recipe_success', "Recette modifiée avec succès");
    }


    /**
     * 
     */
    public function recipeSetOnPublic(Request $request, int $userId, int $recipeId)
    {
        DB::beginTransaction();
        try {
            $this->recipeRepository->updateField($recipeId, 'visibility', true);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('recipe_warning', "Impossible de rendre public la recette");
        }

        return redirect()->back()->with('recipe_success', "Votre recette est publique");
    }


    /**
     * 
     */
    public function recipeSetOnPrivate(Request $request, int $userId, int $recipeId)
    {
        DB::beginTransaction();
        try {
            $this->recipeRepository->updateField($recipeId, 'visibility', false);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('recipe_warning', "Impossible de rendre public la recette");
        }

        return redirect()->back()->with('recipe_success', "Votre récette est privée");
    }


    /**
     * Delete a recipe whose id have been specified from DB
     * 
     * @param int $recipeId
     */
    public function deleteRecipe(Request $request, int $userId, int $recipeId)
    {
        if (!$request->session()->has('user')) {
            return redirect()->route('signin.show');
        }

        try {
            $this->imageRepository->deleteRecipeImages($recipeId);
            $this->stepRepository->deleteRecipeSteps($recipeId);
            $this->quantityRepository->deleteRecipeQunatities($recipeId);
            $this->recipeRepository->deleteRecipe($recipeId);
        } catch (Exception $exception) {
            return redirect()->back()->with('recipe_warning', "Impossible de supprimer la recette");
        }

        return redirect()->back()->with('recipe_success', "Recette supprimée avec succès");
    }
    public function index()
    {
        $recipes = Recipe::with('ratings')->get();

        return view('recipes.index', ['recipes' => $recipes]);
    }

    public function filterByRating(Request $request)
    {
        $rating = $request->input('rating');
    
        if ($rating) {
            $recipes = Recipe::whereHas('ratings', function ($query) use ($rating) {
                $query->where('stars', $rating);
            })->get();
        } else {
            $recipes = Recipe::all();
        }
    
        return view('recipes.filtered_recipes', ['recipes' => $recipes, 'selectedRating' => $rating]);
    }
    

}
