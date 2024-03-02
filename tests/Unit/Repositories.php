<?php

namespace Tests\Unit\Repositories;

use App\Models\User;
use App\Repositories\AuthRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test de l'enregistrement d'un utilisateur avec des données valides.
     */
    public function testRegisterWithValidData()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password1234',
            'password_confirmation' => 'password1234',
        ];

        $repository = new AuthRepository();
        $user = $repository->register($userData);

        // Assert que l'utilisateur est une instance de la classe User
        $this->assertInstanceOf(User::class, $user);

        // Assert que le nom de l'utilisateur est correctement enregistré
        $this->assertEquals($userData['name'], $user->name);

        // Assert que l'email de l'utilisateur est correctement enregistré
        $this->assertEquals($userData['email'], $user->email);

        // Assert que le mot de passe est haché correctement
        $this->assertTrue(Hash::check($userData['password'], $user->password));
    }

    /**
     * Test de la connexion d'un utilisateur avec des informations d'identification valides.
     */
    public function testLoginWithValidCredentials()
    {
        $user = User::factory()->create();

        $credentials = [
            'email' => $user->email,
            'password' => 'password1234',
        ];

        $repository = new AuthRepository();
        $authenticatedUser = $repository->login($credentials);

        // Assert que l'utilisateur authentifié est une instance de la classe User
        $this->assertInstanceOf(User::class, $authenticatedUser);

        // Assert que l'ID de l'utilisateur authentifié est le même que celui de l'utilisateur créé
        $this->assertEquals($user->id, $authenticatedUser->id);
    }

    /**
     * Test de la déconnexion d'un utilisateur.
     */
    public function testLogout()
    {
        $user = User::factory()->create();

        Auth::login($user);

        $repository = new AuthRepository();
        $repository->logout();

        // Assert que l'utilisateur n'est plus connecté
        $this->assertFalse(Auth::check());
    }
}
