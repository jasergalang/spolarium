<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
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
Route::get('/login', function () {
    return view('user.login');
});
Route::get('/cusregister', function () {
    return view('user.cusRegister');
});
Route::get('/artregister', function () {
    return view('user.artRegister');
});

// Route::get('/mail', function () {
//     Mail::to('eliso@gmail.com')->send(new Verification());
// });



//register na may database?
Route::post('/register', [AuthController::class, 'register'])->name('register');
//login na may database (di gumagana login logic taga show lang sya ng website)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('verify/{token}', [AuthController::class, 'verify']);