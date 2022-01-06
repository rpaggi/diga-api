<?php

use App\Http\Controllers\{
  MovieController,
  UserController
};
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;

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
Passport::routes();

Route::post('/user', [UserController::class, 'store']);

Route::middleware('auth:api')->group(function(){
  Route::apiResource('movies', MovieController::class);
});
