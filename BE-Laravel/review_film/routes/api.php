<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MovieController;
use App\Http\Controllers\API\GenreController;
use App\Http\Controllers\API\CastController;
use App\Http\Controllers\API\CastMovieController;
use App\Http\Requests\MovieRequest;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post("/v1/movie", [MovieController::class , 'store']);
Route::prefix('v1')->group(function () {
    // Route::post("/movie", [MovieController::class, 'store']);
    Route::apiResource("genre", GenreController::class);
    Route::apiResource("cast", CastController::class);
    Route::apiResource('movie', MovieController::class);
    Route::apiResource('cast_movie', CastMovieController::class);
    Route::prefix('auth')->group(function($user){
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    });
    Route::post('/update-user', [AuthController::class, 'updateUser'])->middleware('auth:api');
    Route::get('/me', [AuthController::class, 'getUser'])->middleware('auth:api');
    
    });