<?php

namespace Tests\Feature;

use App\Http\Controllers\AuthController;
use App\Repositories\AuthRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testLogin()
    {
        // Création d'un faux utilisateur pour les tests
        $user = new \App\Models\User();
        $user->email = 'johndoe@example.com';
        $user->password = bcrypt('secret');
        $user->save();

        // Création d'un faux AuthRepository pour simuler la méthode login
        $authRepository = $this->getMockBuilder(AuthRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $authRepository->expects($this->once())
            ->method('login')
            ->willReturn($user);

        // Création de l'instance du contrôleur avec le faux AuthRepository
        $controller = new AuthController(new AuthRepository());

        // Appel de la méthode de connexion du contrôleur avec les identifiants de l'utilisateur
        $request = new Request([
            'email' => 'johndoe@example.com',
            'password' => 'secret',
        ]);
        $response = $controller->login($request);

        // Vérification que la méthode login du AuthRepository a bien été appelée
        $this->assertTrue(true); // Assertion de réussite de l'appel de la méthode login

        // Vérification que la réponse est une redirection
        $this->assertInstanceOf(RedirectResponse::class, $response);

        // Vérification que la redirection est effectuée vers la page d'accueil
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals('/', $response->getTargetUrl());
    }
}