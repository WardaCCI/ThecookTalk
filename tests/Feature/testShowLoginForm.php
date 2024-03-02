<?php

namespace Tests\Feature;

use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testShowLoginForm()
    {
        // **Test l'affichage du formulaire de connexion**

        $controller = new AuthController();

        $response = $controller->showLoginForm();

        // **Assert que la réponse est une vue**
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);

        // **Assert que le nom de la vue est 'auth.login'**
        $this->assertEquals('auth.login', $response->viewName());
    }
}
