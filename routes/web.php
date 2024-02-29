<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\ControllerDonoval;
=======
>>>>>>> baptiste

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
<<<<<<< HEAD


Route::get('/mounir', [ControllerDonoval::class, 'wardia']);


// php artisan make:controller controllerDonoval
=======
>>>>>>> baptiste
