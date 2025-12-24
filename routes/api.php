<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Articles\IndexController as ArticleIndexController;
use App\Http\Controllers\Articles\StoreController as ArticleStoreController;
use App\Http\Controllers\Articles\ShowController as ArticleShowController;
use App\Http\Controllers\Articles\UpdateController as ArticleUpdateController;
use App\Http\Controllers\Articles\DestroyController as ArticleDestroyController;
use App\Http\Controllers\Categories\IndexController as CategoryIndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);



// Protected Routes
Route::middleware('auth:sanctum')->group(function () {

    // Articles
    Route::get('/articles', ArticleIndexController::class);
    Route::post('/articles', ArticleStoreController::class);
    Route::get('/articles/{id}', ArticleShowController::class);
    Route::put('/articles/{id}', ArticleUpdateController::class);
    Route::delete('/articles/{id}', ArticleDestroyController::class);

    // Categories
    Route::get('/categories', CategoryIndexController::class);
});
