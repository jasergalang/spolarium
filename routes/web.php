<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\BlogController;
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

Route::get('/artwork', function () {
    return view('artwork.artworkdashboard');
});
Route::get('art', function () {
    return view('material.create');
});
Route::get('testing', function () {
    return view('layout.testing');
});
Route::get('/event', function () {
    return view('event.eventdashboard');
});
Route::get('/manageevent', function () {
    return view('event.manageevent');
});

// Route::get('/mail', function () {
//     Mail::to('eliso@gmail.com')->send(new Verification());
// });

//Registration
Route::get('artregister', [AuthController::class, 'artistRegister'])->name('artregister');
Route::post('artregister', [AuthController::class, 'artRegister'])->name('artregister.store');
Route::get('cusregister', [AuthController::class, 'customerRegister'])->name('cusregister');
Route::post('cusregister', [AuthController::class, 'cusRegister'])->name('cusregister.store');

//Events
Route::get('/events', [EventController::class, 'index'])->name('event.index');
Route::get('/events/create', [EventController::class, 'create'])->name('event.create');
Route::post('/events', [EventController::class, 'store'])->name('event.store');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('event.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('event.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('event.destroy');

//ArtworkCrud
Route::get('/artwork/dashboard', [ArtworkController::class, 'dashboard'])->name('artwork.dashboard');
Route::get('/artwork/create', [ArtworkController::class, 'create'])->name('artwork.create');
Route::post('/artwork', [ArtworkController::class, 'store'])->name('artwork.store');
Route::get('/artworks/{id}', [ArtworkController::class, 'show'])->name('artwork.show');
Route::get('/artworks/{id}/edit', [ArtworkController::class, 'edit'])->name('artwork.edit');
Route::put('/artworks/{id}', [ArtworkController::class, 'update'])->name('artwork.update');
Route::delete('/artworks/{id}', [ArtworkController::class, 'destroy'])->name('artwork.destroy');
Route::put('/artwork/{id}/restore', [ArtworkController::class, 'restore'])->name('artwork.restore');

//login na may database (di gumagana login logic taga show lang sya ng website)

//login

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('verify/{token}', [AuthController::class, 'verify']);

//email verification
Route::get('/email/verify', [VerificationController::class, 'sendVerificationEmail'])->name('verification.send');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['signed'])->name('verification.verify');


//blogs route pare
// Route to display the blogs dashboard
Route::get('/blogsdashboard', [BlogController::class, 'dashboard'])->name('blogsdashboard');
Route::get('/createblogs', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/createblogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/show/{id}', [BlogController::class, 'show'])->name('blogs.show');
// Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
Route::delete('/destroy/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
// Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::get('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
// Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
