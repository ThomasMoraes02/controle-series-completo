<?php

use App\Mail\SeriesCreated;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Após instalação do Breeze, todas as rotas se encontram em /auth.php
// Route::get('/', function () {
//     return redirect()->route('series.index');
// })->middleware(Autenticator::class);


// // Middleware em Grupo de Rotas
// Route::middleware('autenticator')->group(function() {
//     // Series
//     Route::resource("/series", SeriesController::class)->except(['show']);

//     // Seasons
//     Route::get("/series/{series}/seasons", [SeasonsController::class, 'index'])->name('seasons.index');

//     // Episodes
//     Route::get("/season/{season}/episodes", [EpisodesController::class, 'index'])->name('episodes.index');
//     Route::put("/season/{season}/episodes", [EpisodesController::class, 'update'])->name('episodes.update');
// });

// // Login/Logout
// Route::get("/login", [LoginController::class, 'index'])->name('login');
// Route::post("/login", [LoginController::class, 'store'])->name('signin');
// Route::get("/logout", [LoginController::class, 'destroy'])->name('logout');

// // Register User
// Route::get("/register", [UsersController::class, 'create'])->name('users.create');
// Route::post("/register", [UsersController::class, 'store'])->name('users.store');

// Route::resource("/series", SeriesController::class)->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);

// Route::controller(SeriesController::class)->group(function(){
//     Route::get('/series','index')->name('series.index');
//     Route::get('/series/create','create')->name('series.create');
//     Route::post('/series/store','store')->name('series.store');
// });

Route::get('/email', function() {
    return new SeriesCreated(4, 'The Witcher', 20, 50);
});