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

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.show');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
Route::get('/signup/verify', [AuthController::class, 'showSignupVerify'])->name('signup.verify');

Route::get('/signin', [AuthController::class, 'showSigninForm'])->name('signin.show');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin.post');


Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard.show');

Route::get('/', function () {
    return view('welcome');
});
