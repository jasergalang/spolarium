<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\Auth\LoginController;
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
    return view('event.dashboard');
});
Route::get('/manageevent', function () {
    return view('event.manageevent');
});

Route::get('/home', function () {
    return view('home');
});


Route::get('/cart', function () {
    return view('cart.cartform');
});

Route::get('/showcase', function () {
    return view('artworkshowcase');
});

Route::get('/checkout', function () {
    return view('cart.checkout');
});

Route::get('/charts', function () {
    return view('charts.charts');
});
// Route::get('/mail', function () {
//     Mail::to('eliso@gmail.com')->send(new Verification());
// });

Route::get('/home', [ArtworkController::class, 'home'])->name('home');
//Registration
Route::get('artregister', [AuthController::class, 'artistRegister'])->name('artregister');
Route::post('artregister', [AuthController::class, 'artRegister'])->name('artregister.store');
Route::get('cusregister', [AuthController::class, 'customerRegister'])->name('cusregister');
Route::post('cusregister', [AuthController::class, 'cusRegister'])->name('cusregister.store');

//Events
Route::get('/events/dashboard', [EventController::class, 'dashboard'])->name('event.dashboard');
Route::get('/events/index', [EventController::class, 'index'])->name('event.index');
Route::get('/events/create', [EventController::class, 'create'])->name('event.create');
Route::post('/events', [EventController::class, 'store'])->name('event.store');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('event.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('event.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('event.destroy');
Route::put('events/{id}/restore', [EventController::class, 'restore'])->name('event.restore');

//ArtworkCrud
Route::get('/artwork/index', [ArtworkController::class, 'index'])->name('artwork.index');
Route::get('/artwork/dashboard', [ArtworkController::class, 'dashboard'])->name('artwork.dashboard');
Route::get('/artwork/create', [ArtworkController::class, 'create'])->name('artwork.create');
Route::post('/artwork', [ArtworkController::class, 'store'])->name('artwork.store');
Route::get('/artworks/{id}', [ArtworkController::class, 'show'])->name('artwork.show');
Route::get('/artworks/{id}/edit', [ArtworkController::class, 'edit'])->name('artwork.edit');
Route::put('/artworks/{id}', [ArtworkController::class, 'update'])->name('artwork.update');
Route::delete('/artworks/{id}', [ArtworkController::class, 'destroy'])->name('artwork.destroy');
Route::put('/artwork/{id}/restore', [ArtworkController::class, 'restore'])->name('artwork.restore');
Route::get('/artwork/trashed', [ArtworkController::class, 'trashed'])->name('artwork.trashed');

//MaterialCrud
Route::get('/material/index', [MaterialController::class, 'index'])->name('material.index');
Route::get('/material/dashboard', [MaterialController::class, 'dashboard'])->name('material.dashboard');
Route::get('/material/create', [MaterialController::class, 'create'])->name('material.create');
Route::post('/material', [MaterialController::class, 'store'])->name('material.store');
Route::get('/material/{id}', [MaterialController::class, 'show'])->name('material.show');
Route::get('/material/{id}/edit', [MaterialController::class, 'edit'])->name('material.edit');
Route::put('/material/{id}', [MaterialController::class, 'update'])->name('material.update');
Route::delete('/material/{id}', [MaterialController::class, 'destroy'])->name('material.destroy');
Route::put('/material/{id}/restore', [MaterialController::class, 'restore'])->name('material.restore');

//UserCrud
Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::put('/user/{id}/restore', [UserController::class, 'restore'])->name('user.restore');

//CartCrud
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::post('/cart/add-artwork', [CartController::class, 'addArtworkToCart'])->name('cart.addArtwork');
Route::post('/cart/add-material', [CartController::class, 'addMaterialToCart'])->name('cart.addMaterial');
Route::put('/cart/material/{materialId}', [CartController::class, 'updateMaterialQuantity'])->name('cart.updateMaterialQuantity');
Route::get('/cart/index', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/{id}/material',  [CartController::class, 'destroyMaterial'])->name('cart.material.destroy');
Route::delete('/cart/{id}/artwork',  [CartController::class, 'destroyArtwork'])->name('cart.artwork.destroy');
//profile
Route::get('/profile', [AuthController::class, 'show'])->name('user.profile');

//login
Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
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


//charts
Route::get('/chart', function () {
    $customerCount = User::where('roles', 'customer')->count();
    $artistCount = User::where('roles', 'artist')->count();

    return view('charts.charts', compact('customerCount', 'artistCount'));
});
