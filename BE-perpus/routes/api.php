<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\BorrowController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    
    Route::get('books', [BookController::class, 'index']); // Public route
    Route::get('books/{id}', [BookController::class, 'show']); // Public route
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('users', UserController::class);
        Route::apiResource('profiles', ProfileController::class);
        Route::apiResource('categories', CategoryController::class);
        Route::apiResource('books', BookController::class)->except(['index', 'show']);
        Route::apiResource('borrows', BorrowController::class);
    });
});
