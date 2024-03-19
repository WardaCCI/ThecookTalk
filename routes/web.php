<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecetteController;

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

// Route::get('/recettes', 'RecetteController@index'); // Affichage de toutes les recettes
// Route::get('/recettes/create', 'RecetteController@create'); // Formulaire de création
// Route::post('/recettes', 'RecetteController@store'); // Enregistrement d'une nouvelle recette
// Route::get('/recettes/{id}', 'RecetteController@show'); // Affichage d'une recette spécifique
// Route::get('/recettes/{id}/edit', 'RecetteController@edit'); // Formulaire de modification
// Route::put('/recettes/{id}', 'RecetteController@update'); // Mise à jour d'une recette
// Route::delete('/recettes/{id}', 'RecetteController@destroy')->name('recettes.destroy');

Route::get('/recettes', [RecetteController::class, 'index']); // Affichage de toutes les recettes
Route::get('/recettes/create', [RecetteController::class, 'create']); // Formulaire de création
Route::post('/recettes', 'RecetteController@store')->name('recettes.store');
// Route::post('/recettes', [RecetteController::class, 'store']); // Enregistrement d'une nouvelle recette
// Route::get('/recettes/{id}', [RecetteController::class, 'show']); // Affichage d'une recette spécifique
Route::get('/recettes/{id}', 'RecetteController@show')->name('recettes.show');

Route::get('/recettes/{id}/edit', [RecetteController::class, 'edit']); // Formulaire de modification
Route::put('/recettes/{id}', [RecetteController::class, 'update']); // Mise à jour d'une recette
Route::delete('/recettes/{id}', [RecetteController::class, 'delete'])->name('recettes.destroy');