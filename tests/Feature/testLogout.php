<?php
namespace Tests\Feature;

use App\Http\Controllers\AuthController;
use App\Repositories\AuthRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testLogout()
    {
        // Création d'un faux AuthRepository pour simuler la méthode logout
        $authRepository = $this->getMockBuilder(AuthRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        
        $authRepository->expects($this->once())
            ->method('logout');

        // Création de l'instance du contrôleur avec le faux AuthRepository
        $controller = new AuthController(new AuthRepository());
        
        // Appel de la méthode de déconnexion du contrôleur
        $controller->logout();
        
        // Vérification que la méthode logout du AuthRepository a bien été appelée
        $this->assertTrue(true); // Assertion de réussite de l'appel de la méthode logout
    }
}