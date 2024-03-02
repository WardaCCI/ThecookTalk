<?php

namespace Tests\Feature;

use App\Http\Controllers\AuthController;
use App\Repositories\AuthRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase, MockeryPHPUnitIntegration;

    public function testRegister()
    {
        // **Test l'enregistrement d'un nouvel utilisateur**

        $controller = new AuthController(new AuthRepository());

        $request = new Request([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);

        $authRepository = Mockery::mock(AuthRepository::class);
        $authRepository->shouldReceive('register')->with($request->all())->andReturn(true);

        $controller->setAuthRepository($authRepository);

        $response = $controller->register($request);

        // **Assert que la réponse est une redirection**
        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);

        // **Assert que la redirection est vers la page de confirmation**
        $this->assertEquals('/confirmation', $response->getTargetUrl());
    }
}
