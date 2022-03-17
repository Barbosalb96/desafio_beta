<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::prefix('v1')->group(function () {
    Route::post('login', [\App\Http\Controllers\Api\LoginController::class, 'login']);
    Route::post('register', [\App\Http\Controllers\Api\LoginController::class, 'register']);


    Route::middleware('auth:api')->group(function () {
        Route::prefix('category')->group(function () {
            Route::get('/', [\App\Http\Controllers\Api\CategoryController::class, 'index']);
            Route::get('/{category}', [\App\Http\Controllers\Api\CategoryController::class, 'filterCategory']);
            Route::get('/{category}/movie', [\App\Http\Controllers\Api\CategoryController::class, 'filterCategoryMovie']);
        });

        Route::prefix('movie')->group(function () {
            Route::get('/', [\App\Http\Controllers\Api\MovieController::class, 'index']);
            Route::get('/name={name}', [\App\Http\Controllers\Api\MovieController::class, 'filterMovie']);
            Route::get('/{name}/category', [\App\Http\Controllers\Api\MovieController::class, 'filterMovieCategory']);
            Route::get('/heroes', [\App\Http\Controllers\Api\MovieController::class, 'HeroMovie']);
            Route::get('/{movie}/heroes', [\App\Http\Controllers\Api\MovieController::class, 'filterHeroMovie']);
        });

        Route::prefix('hero')->group(function () {
            Route::get('/', [\App\Http\Controllers\Api\HeroController::class, 'index']);
            Route::get('/name={name}', [\App\Http\Controllers\Api\HeroController::class, 'filterHero']);
            Route::get('/power', [\App\Http\Controllers\Api\HeroController::class, 'heroPower']);
            Route::get('/{name}/powers', [\App\Http\Controllers\Api\HeroController::class, 'filterHeroPowers']);
            Route::get('/movie', [\App\Http\Controllers\Api\HeroController::class, 'HeroMovie']);
            Route::get('/{name}/movies', [\App\Http\Controllers\Api\HeroController::class, 'filterHeroMovie']);
        });

    });
});
