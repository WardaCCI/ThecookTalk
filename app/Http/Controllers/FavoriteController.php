<?php



namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\FavoriteRepository;

class FavoriteController extends Controller
{
    protected $favoriteRepository;

    public function __construct(FavoriteRepository $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    public function addFavorite(Request $request)
    {
        try {
            // Récupérer l'ID de l'utilisateur authentifié (à adapter selon votre logique)
            $userID = $request->session()->get('user')['id'];

            // Valider les données de la requête
            $validatedData = $request->validate([
                'recipeId' => ['required', 'numeric'], // Exemple de validation
            ]);

            // Toggle the favorite status for the given user and recipe
            $isFavorite = $this->favoriteRepository->toggleFavorite($userID, $validatedData['recipeId']);

            // Rediriger l'utilisateur vers la page précédente avec un message approprié
            if ($isFavorite) {
                return Redirect::back()->with('success', "Favori ajouté avec succès");
            } else {
                return Redirect::back()->with('success', "Favori supprimé avec succès");
            }
        } catch (Exception $exception) {
            // En cas d'erreur, rediriger l'utilisateur vers la page précédente avec un message d'erreur
            return Redirect::back()->with('error', "Une erreur s'est produite lors de l'ajout du favori");
        }
    }



    public function deleteFavorite(int $userId, int $favoriteId)
    {  
        try {
            $this->favoriteRepository->deleteFavorite($favoriteId);
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with("favorite_warning", "Echec de la suppression de votre favorit");
        }

        return redirect()->back()->with('favorite_success', "Votre favoris a été bien supprimé");
    }


}
