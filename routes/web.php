<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecetteController;

// Route::get('/', function () {
//     return view('welcome');
// });

/** home route */
Route::get('/', [AuthController::class, 'showHome'])
    ->name('home.show');

/** ------------------------------------------------------------------------------------------------ */
/** signup password routes */
Route::get('/signup', [AuthController::class, 'showSignupForm'])
    ->name('signup.show');

Route::post('/signup', [AuthController::class, 'signup'])
    ->name('signup.post');

Route::get('/signup/verify/{userId}', [AuthController::class, 'showSignupVerify'])
    ->where('userId', '[0-9]+')->name('verify.show');

Route::post('/signup/verify/{userId}', [AuthController::class, 'sendEmailValidation'])
    ->where('userId', '[0-9]+')
    ->name('verify.post');


/** ------------------------------------------------------------------------------------------------ */
/** signin routes */
Route::get('/signin', [AuthController::class, 'showSigninForm'])
    ->name('signin.show');

Route::post('/signin', [AuthController::class, 'signin'])
    ->name('signin.post');

Route::get('/signin/{userId}', [AuthController::class, 'showSigninFirstTime'])
    ->where('userId', '[0-9]+')
    ->name('firstAuth.show');

Route::get('/signin/{userId}/{userNewEmail}', [AuthController::class, 'showSigninAfterNewEmailValidation'])
    ->where('userId', '[0-9]+')
    ->where('userNewEmail', '[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}')
    ->name('newEmailAuth.show');


/** ------------------------------------------------------------------------------------------------ */
/** edit password routes */
Route::get('/signin/forgotPassword', [AuthController::class, 'showForgotPasswordForm'])
    ->name('forgotPassword.show');

Route::post('/signin/forgotPassword', [AuthController::class, 'forgotPassword'])
    ->name('forgotPassword.post');

Route::get('/signin/forgotPassword/{userId}', [AuthController::class, 'showEditPasswordForm'])
    ->where('userId', '[0-9]+')
    ->name('editPassword.show');

Route::post('/signin/forgotPassword/{userId}', [AuthController::class, 'editPassword'])
    ->where('userId', '[0-9]+')
    ->name('editPassword.post');


/** ------------------------------------------------------------------------------------------------ */
/** logout route */
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/** ------------------------------------------------------------------------------------------------ */
/** user signin routes */
Route::get('/users/{userId}/dashboard', [AuthController::class, 'showUserDashboard'])
    ->where('userId', '[0-9]+')
    ->name('dashboard.show');

Route::get('/users/{userId}/dashboard/informations', [AuthController::class, 'showUserDashboardInfosForm'])
    ->where('userId', '[0-9]+')
    ->name('informations.show');

Route::put('/users/{userId}/dashboard/informations', [AuthController::class, 'updateInformations'])
    ->where('userId', '[0-9]+')
    ->name('informations.update');

Route::put('/users/{userId}/dashboard/avatar', [AuthController::class, 'updateAvatar'])
    ->where('userId', '[0-9]+')
    ->name('avatar.update');

Route::post('/users/{userId}/dashboard/avatar', [AuthController::class, 'deleteAvatar'])
    ->where('userId', '[0-9]+')
    ->name('avatar.delete');

Route::get('/users/{userId}/dashboard/email', [AuthController::class, 'showUserDashboardEmailForm'])
    ->where('userId', '[0-9]+')
    ->name('email.show');

Route::put('/users/{userId}/dashboard/email', [AuthController::class, 'updateEmail'])
    ->where('userId', '[0-9]+')
    ->name('email.update');

Route::get('/users/{userId}/dashboard/password', [AuthController::class, 'showUserDashboardPasswordForm'])
    ->where('userId', '[0-9]+')
    ->name('password.show');

Route::put('/users/{userId}/dashboard/password', [AuthController::class, 'updatePassword'])
    ->where('userId', '[0-9]+')
    ->name('password.update');

Route::post('/users/{userId}/delete', [AuthController::class, 'deleteUser'])
    ->where('userId', '[0-9]+')
    ->name('user.delete');

Route::get('/', function () {
    return view('welcome');
});

/** ------------------------------------------------------------------------------------------------ */
/** user login /logout routes */


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

/** ------------------------------------------------------------------------------------------------ */
/** recipe routes */

Route::get('/recettes', [RecetteController::class, 'index']); // Affichage de toutes les recettes
Route::get('/recettes/create', [RecetteController::class, 'create']); // Formulaire de création
Route::post('/recettes', 'RecetteController@store')->name('recettes.store');// Enregistrement d'une nouvelle recette
Route::get('/recettes/{id}', 'RecetteController@show')->name('recettes.show');// Affichage d'une recette spécifique
Route::get('/recettes/{id}/edit', [RecetteController::class, 'edit']); // Formulaire de modification
Route::put('/recettes/{id}', [RecetteController::class, 'update']); // Mise à jour d'une recette
Route::delete('/recettes/{id}', [RecetteController::class, 'delete'])->name('recettes.destroy');//Suppression de recette