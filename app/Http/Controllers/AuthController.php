<?php

namespace App\Http\Controllers;

use App\Repositories\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Appel de la méthode register de AuthRepository
        $user = $this->authRepository->register($request->all());

        // Autres actions après l'inscription, comme rediriger l'utilisateur vers une page de confirmation
    }

    public function login(Request $request)
    {
        // Appel de la méthode login de AuthRepository
        $credentials = $request->only('email', 'password');
        $user = $this->authRepository->login($credentials);

        if ($user) {
            // L'authentification a réussi, rediriger l'utilisateur vers une page d'accueil ou une autre page appropriée
        } else {
            // L'authentification a échoué, rediriger l'utilisateur vers la page de connexion avec un message d'erreur
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        // Appel de la méthode logout de AuthRepository
        $this->authRepository->logout();

        // Rediriger l'utilisateur vers une page appropriée après la déconnexion
    }
}
