<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VerificationController;

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


Route::get('/createevent', function () {
    return view('event.createevent');
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
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');





//register na may database?
Route::post('/register', [AuthController::class, 'register'])->name('register');
//login na may database (di gumagana login logic taga show lang sya ng website)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('verify/{token}', [AuthController::class, 'verify']);

//email verification
Route::get('/email/verify', [VerificationController::class, 'sendVerificationEmail'])->name('verification.send');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
