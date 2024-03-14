<?php
use Tests\TestCase;
use App\Repository\Recipe;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;

class RecipeRepositoryTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    /** @test */
    public function it_adds_recipe_to_database()
    {
        // Replace with your actual data
        $cookingtype = 'four';
        $recipename = 'Test Recipe';
        $time = $this->faker->randomDigit; // Utilisez $this->faker pour accéder à la propriété faker
        $category = 'plat';
        $difficulty = 'facile';
        $idUser = 1;

        // Create an instance of the Recipe repository
        $recipeRepository = new Recipe();

        // Call the addRecipe method
        $recipeId = $recipeRepository->addRecipe($cookingtype, $recipename, $time, $category, $difficulty, $idUser);

        // Assert that the method returns a valid recipe ID (positive integer)
        $this->assertIsInt($recipeId);
        $this->assertGreaterThan(0, $recipeId);

        // Assert that the recipe exists in the database
        $this->assertDatabaseHas('recipes', [
            'id' => $recipeId,
            'recipename' => $recipename,
            'time' => $time,
            'cookingtype' => $cookingtype,
            'category' => $category,
            'difficulty' => $difficulty,
            'id_user' => 1,
        ]);
    }
}
