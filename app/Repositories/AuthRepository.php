<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{
    public function register($userData)
    {
        // Valider les données du formulaire (nom, email, mot de passe)
        $validatedData = validator($userData, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        ], [
            'password.regex' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.'
        ])->validate();

        // Créer un nouvel utilisateur
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Envoyer un e-mail de vérification (peut être implémenté ultérieurement)

        return $user;
    }

    public function login($credentials)
    {
        // Tentative de connexion
        if (Auth::attempt($credentials)) {
            // Si la connexion réussit, retourner l'utilisateur authentifié
            return Auth::user();
        }

        // Si la connexion échoue, retourner null
        return null;
    }

    public function logout()
    {
        // Déconnexion de l'utilisateur actuel
        Auth::logout();
    }
}
