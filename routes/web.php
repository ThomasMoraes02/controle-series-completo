<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Autenticator;

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
    return redirect()->route('series.index');
})->middleware(Autenticator::class);


// Middleware em Grupo de Rotas
Route::middleware('autenticator')->group(function() {
    // Series
    Route::resource("/series", SeriesController::class)->except(['show']);

    // Seasons
    Route::get("/series/{series}/seasons", [SeasonsController::class, 'index'])->name('seasons.index');

    // Episodes
    Route::get("/season/{season}/episodes", [EpisodesController::class, 'index'])->name('episodes.index');
    Route::put("/season/{season}/episodes", [EpisodesController::class, 'update'])->name('episodes.update');
});

// Login/Logout
Route::get("/login", [LoginController::class, 'index'])->name('login');
Route::post("/login", [LoginController::class, 'store'])->name('signin');
Route::get("/logout", [LoginController::class, 'destroy'])->name('logout');

// Register User
Route::get("/register", [UsersController::class, 'create'])->name('users.create');
Route::post("/register", [UsersController::class, 'store'])->name('users.store');

// Route::resource("/series", SeriesController::class)->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);

// Route::controller(SeriesController::class)->group(function(){
//     Route::get('/series','index')->name('series.index');
//     Route::get('/series/create','create')->name('series.create');
//     Route::post('/series/store','store')->name('series.store');
// });