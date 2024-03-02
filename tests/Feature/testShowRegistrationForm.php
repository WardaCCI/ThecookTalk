<?php

namespace Tests\Feature;

use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testShowRegistrationForm()
    {
        // **Test l'affichage de la page d'inscription**

        $controller = new AuthController();

        $response = $controller->showRegistrationForm();

        // **Assert que la réponse est une vue**
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);

        // **Assert que le nom de la vue est 'auth.register'**
        $this->assertEquals('auth.register', $response->viewName());
    }
}
