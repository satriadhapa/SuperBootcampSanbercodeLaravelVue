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
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::apiResource('books', BookController::class)->only(['index', 'show']);
    Route::apiResource('category', CategoryController::class)->only(['index', 'show']);
    Route::apiResource('users', UserController::class);
    Route::apiResource('profiles', ProfileController::class);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('borrows', BorrowController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/books/{id}', [BookController::class, 'show']);
        Route::put('/books/{id}', [BookController::class, 'update']);
        Route::delete('/books/{id}', [BookController::class, 'destroy']);
    });

    Route::middleware(['auth:sanctum', 'role.owner'])->group(function () {
        Route::apiResource('categories', CategoryController::class);
        Route::apiResource('borrow', BorrowController::class);
        Route::get('/profile', [ProfileController::class, 'index']);
        Route::put('/profile', [ProfileController::class, 'update']);
    });
    
});
