<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\CategoryFood\CreateController as CreateCategoryFoodController;
use \App\Http\Controllers\API\Food\CreateController;
use \App\Http\Controllers\API\Auth\RegisterController;
use \App\Http\Controllers\API\Auth\LoginController;
use \App\Http\Controllers\API\Auth\LogoutController;
use \App\Http\Controllers\API\CategoryFood\FetchCategoryFoods;
use \App\Http\Controllers\API\CategoryFood\RemoveController;
use \App\Http\Controllers\API\CategoryFood\UpdateController;

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
    Route::post('/store/create', \App\Http\Controllers\API\Store\CreateController::class);
    Route::post('/category-food/create', CreateCategoryFoodController::class);
    Route::get('/category-foods', FetchCategoryFoods::class);
    Route::put('/category-food/update/{id}', UpdateController::class)->where('id', '[0-9]+');
    Route::delete('/category-food/{id}', RemoveController::class)->where('id', '[0-9]+');
    Route::post('/foods/create', CreateController::class);
    Route::get('/foods/store/{id}', \App\Http\Controllers\API\Food\FetchFoodStoreController::class);

});
