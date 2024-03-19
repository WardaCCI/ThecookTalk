<?php

namespace App\Repositories;
use Exception;
use Illuminate\Support\Facades\DB;
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

    /**
     * Add user to DB with his username, email and password
     * 
     * @param string $username
     * @param string $email
     * @param string $password
     * 
     * @return int
     */
    public function addUser(string $username, string $email, string $password): int
    {
        $passwordHashed = Hash::make($password);

        $userId = DB::table("users")
            ->insertGetId([
                "username" => $username,
                "email" => $email,
                "password" => $passwordHashed,
                "created_at" => now(),
            ]);

        return $userId;
    }


    /**
     * Get user from DB with email
     * 
     * @param string $email
     * 
     * @return array 
     */
    public function getUser(string|int $with): array
    {
        if (is_string($with)) {
            $user = DB::table("users")
                ->where('email', $with)
                ->first();
        } else {
            $user = DB::table("users")
                ->where('id', $with)
                ->first();
        }

        if (!$user) {
            throw new Exception("Utilisateur inconnu");
        }

        return [
            'id' => $user->id,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'birthdate' => $user->birthdate,
            'username' => $user->username,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
            'password' => $user->password,
            'avatar' => $user->avatar ?? 'uploads/avatars/default_avatar.png',
            'email_verified_at' => $user->email_verified_at,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ];
    }


    /**
     * Check if user actual password match to password enter in input
     * 
     * @param string $dbPassword
     * @param string $password
     * 
     * @return boolean
     */
    public function doPasswordsMatch(string $dbPassword, string $password): void
    {
        if (!Hash::check($password, $dbPassword)) {
            throw new Exception("Mot de passe incorrect.");
        }
    }

    /**
     * Check if user email is verified
     */
    public function isEmailVerifiedAtNull(int $id): bool
    {
        $user = DB::table("users")
            ->where("id", $id)
            ->first();
        return is_null($user->email_verified_at);
    }


    /**
     * Search user by the eamil and update the information in the field with the value
     * 
     * @param string $email
     * @param string $field
     * @param string|null $value
     */
    public function updateField(string|int $with, string $field, string|null $value)
    {
        if (is_string($with)) {
            DB::table("users")
                ->where("email", $with)
                ->update([$field => $value]);
        } else {
            DB::table("users")
                ->where("id", $with)
                ->update([$field => $value]);
        }
    }


    /**
     * Hash new password set by user
     * 
     * @param int $email
     * @param string $oldPassword
     * @param string $newPassword
     * 
     * @return string 
     */
    public function hashNewPassword(string $newPassword): string
    {
        return Hash::make($newPassword);
    }


    /**
     * Delete User whose id have been specified from DB
     * 
     * @param int $userId
     */
    public function deleteUser(int $userId)
    {
        DB::table("users")
            ->where("id", $userId)
            ->delete();
    }
}
