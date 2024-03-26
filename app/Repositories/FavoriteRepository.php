<?php
namespace App\Repositories;

use App\Models\Favorite;

class FavoriteRepository
{
    public function addFavorite(int $userID, int $recipeId)
    {
        Favorite::create([
           'id_user' => $userID,
           'id_recipe' => $recipeId,
        ]);
    }

    public function deleteFavorite(int $favoriteId)
    {
        Favorite::where('id', $favoriteId)
            ->delete();
    }

   

    public function getFavoriteByUserAndRecipe(int $userID, int $recipeId)
    {
        return Favorite::where('id_user', $userID)
            ->where('id_recipe', $recipeId)
            ->first();
    }

    public function toggleFavorite(int $userID, int $recipeId): bool
    {
        $existingFavorite = $this->getFavoriteByUserAndRecipe($userID, $recipeId);

        if ($existingFavorite) {
            $this->deleteFavorite($existingFavorite->id);
            return false; // Recette retirée des favoris
        } else {
            $this->addFavorite($userID, $recipeId);
            return true; // Recette ajoutée aux favoris
        }
    }

   
    public function getuserFavoriteRecipes(int $userId)
    {
        return Favorite::join('recipes', 'favorites.id_recipe', '=','recipes.id')
            ->where('favorites.id_user', $userId)
            ->get([
               'recipes.recipename as recipename',
               'favorites.id as id',
               'favorites.id_recipe as id_recipe',
            ]);
    }

}
