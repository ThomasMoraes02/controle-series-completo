<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\EpisodesController;

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
});

Route::resource("/series", SeriesController::class)->except(['show']);

// Route::resource("/series", SeriesController::class)->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);

// Route::controller(SeriesController::class)->group(function(){
//     Route::get('/series','index')->name('series.index');
//     Route::get('/series/create','create')->name('series.create');
//     Route::post('/series/store','store')->name('series.store');
// });

// Seasons
Route::get("/series/{series}/seasons", [SeasonsController::class, 'index'])->name('seasons.index');

// Episodes
Route::get("/season/{season}/episodes", [EpisodesController::class, 'index'])->name('episodes.index');
Route::put("/season/{season}/episodes", [EpisodesController::class, 'update'])->name('episodes.update');