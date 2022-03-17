<?php

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

Route::get('auth/facebook', [\App\Http\Controllers\Api\SocialController::class, 'facebookRedirect'])->name('facebook');
Route::get('logout', [\App\Http\Controllers\Api\SocialController::class, 'logout']);
Route::get('auth/facebook/callback', [\App\Http\Controllers\Api\SocialController::class, 'loginWithFacebook'])->name('callback_facebook');


