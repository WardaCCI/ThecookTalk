<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




// Route pour afficher le formulaire d'inscription
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');

// Route pour traiter la soumission du formulaire d'inscription
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Route pour afficher le formulaire de connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');

// Route pour traiter la soumission du formulaire de connexion
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route pour déconnecter l'utilisateur
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
