<?php

use App\Models\Series;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SeriesController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource("/v1/series", SeriesController::class);

    // Route::get("/v1/series", [SeriesController::class, 'index']);
    // Route::get("/v1/series/{series}", [SeriesController::class, 'show']);
    // Route::post("/v1/series", [SeriesController::class, 'store']);
    // Route::put("/v1/series/{series}", [SeriesController::class, 'update']);
    // Route::delete("/v1/series/{series}", [SeriesController::class, 'destroy']);


    Route::get("/v1/series/{series}/seasons", function (Series $series) {
        return $series->seasons;
    });

    Route::get("/v1/series/{series}/episodes", function (Series $series) {
        return $series->episodes;
    });

    Route::patch("/v1/episodes/{episode}/watch", function (Episode $episode, Request $request) {
        $episode->watched = $request->watched;
        $episode->save();

        return $episode;
    });
});

/**
 * Rota de Login e Autenticação por Token
 */
Route::post("/login", function (Request $request) {
    $credentials = $request->only('email', 'password');

    // $user = User::whereEmail($credentials['email'])->first();
    // if(!$user || !Hash::check($credentials['password'], $user->password)) {
    //     return response()->json(['error' => 'Unauthorized'], 401);
    // }

    if (!Auth::attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    // Revogar Token Antigo
    $request->user()->tokens()->delete();

    $token = $request->user()->createToken('token', ['']);

    return response()->json([
        "acess_token" => $token->plainTextToken
    ]);
});
