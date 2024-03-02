<?php

namespace Tests\Feature;

use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function createApplication()
    {
        return parent::createApplication();
    }

    public function testShowRegistrationForm()
    {
        // **Test l'affichage de la page d'inscription**

        $controller = new AuthController();

        $response = $controller->showRegistrationForm();

        // **Assert que la réponse est une vue**
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);

        // **Assert that the view contains a specific element (e.g., form with ID "register-form")**
        $this->assertViewHas('register-form'); // Replace 'register-form' with the actual element ID
    }
}
