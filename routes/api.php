<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\Food\CreateController;
use \App\Http\Controllers\API\Auth\RegisterController;
use \App\Http\Controllers\API\Auth\LoginController;
use \App\Http\Controllers\API\Auth\LogoutController;

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
Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', LogoutController::class);
    Route::get('/foods', [CreateController::class, 'index']);

});
