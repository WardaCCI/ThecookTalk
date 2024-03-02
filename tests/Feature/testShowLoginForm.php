<?php

namespace Tests\Feature;

use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;
use illuminate\view;
class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Créer l'application Laravel pour les tests.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        return parent::createApplication();
    }

    public function testShowLoginForm()
    {
        // **Test l'affichage du formulaire de connexion**

        $controller = new AuthController();

        $response = $controller->showLoginForm();

        // **Assert que la réponse est une vue**
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        
        // **Assert that the view contains a specific element (e.g., form with ID "login-form")**
        $this->assertViewHas('login-form'); // Replace 'login-form' with the actual element ID

        // **Alternatively, if you need to assert specific content of the view:**
        $this->assertViewIs('auth.login'); // Use this only if you know the exact view name
    }
}
