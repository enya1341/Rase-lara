<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\FavoritesController;
use App\Http\Controllers\V1\LoginController;
use App\Http\Controllers\V1\LogoutController;
use App\Http\Controllers\V1\RegisterController;
use App\Http\Controllers\V1\ReservationsController;
use App\Http\Controllers\V1\StoresController;
use App\Http\Controllers\V1\UsersController;

Route::post('/v1/users/register', [RegisterController::class, 'post']);
Route::post('/v1/login', [LoginController::class, 'post']);
Route::post('/v1/logout', [LogoutController::class, 'post']);
Route::post('/v1/favorites', [FavoritesController::class, 'post']);
Route::post('/v1/reservitions', [FavoritesController::class, 'post']);

Route::get('/v1/user', [UsersController::class, 'get']);
Route::get('/v1/favorites/{user_id}', [FavoritesController::class, 'get']);
Route::get('/v1/reservations/{user_id}', [ReservationsController::class, 'get']);
Route::get('/v1/stores/{store_id?}', [StoresController::class, 'get']);

Route::delete('/v1/favorites/{user_id}', [FavoritesController::class, 'delete']);
Route::delete('/v1/reservations/{user_id}', [ReservationsController::class, 'delete']);