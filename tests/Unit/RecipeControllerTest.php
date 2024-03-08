<?php

use Tests\TestCase;
use App\Http\Controllers\RecipeController; // Assurez-vous d'importer correctement votre contrôleur
use App\Repository\Recipe;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;

class RecipeControllerTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    /** @test */
    public function test_insertRecipe_method()
    {
        // Replace with your actual model and repository class
        $recipeRepository = new Recipe();
        $controller = new RecipeController($recipeRepository);

        // Create a fake request with valid data
        $request = [
            'recipename' => 'soupe',
            'time' => $this->faker->randomDigit,
            'cookingtype' => 'four',
            'category' => 'plat',
            'difficulty' => 'facile',
            'id_user' => 1,
        ];

        // Call the insertRecipe method from your controller
        $controller->insertRecipe($request);

        // Assert that the recipe exists in the database
        $this->assertDatabaseHas('recipes', [
            'recipename' => $request['recipename'],
            'time' => $request['time'],
            'cookingtype' => $request['cookingtype'],
            'category' => $request['category'],
            'difficulty' => $request['difficulty'],
            'id_user' => $request['id_user'],
        ]);
    }

    // Add more test cases as needed
}