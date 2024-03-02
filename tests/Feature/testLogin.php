<?php

namespace Tests\Feature;

use App\Http\Controllers\AuthController;
use App\Repositories\AuthRepository;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testLogin()
    {
        // Create a user for testing
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Create a login request with valid credentials
        $request = new Request([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        // Instantiate an AuthController with a mock AuthRepository
        $authRepository = \Mockery::mock(AuthRepository::class);
        $authRepository->shouldReceive('login')->once()->with($request->only('email', 'password'))->andReturn($user);

        $controller = new AuthController($authRepository);

        // Call the login method and assert the response
        $response = $controller->login($request);

        // Check if the response is an instance of RedirectResponse and the target URL is '/'
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            $this->assertEquals('/', $response->getTargetUrl());
        } else {
            $this->fail('The login method did not return an instance of RedirectResponse.');
        }
    }
}