<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\UsersController;


Route::post('/v1/users/registration', [RegisterController::class, 'post']);


Route::post('/v1/users/login', [LoginController::class, 'post']);
Route::post('/v1/users/logout', [LogoutController::class, 'post']);


Route::get('/v1/users/{user_id}', [UsersController::class, 'get']);
Route::get('/v1/{user_id}/favorites', [FavoritesController::class, 'get']);
Route::get('/v1/{user_id}/reservations', [ReservationsController::class, 'get']);


Route::get('/v1/stores', [StoresController::class, 'storeget'])->name('storeget');
Route::get('/v1/{store_id}/stores', [StoresController::class, 'storedata'])->name('storedata');


Route::post('/v1/{store_id}/favorites', [FavoritesController::class, 'post']);
Route::delete('/v1/{store_id}/favorites', [FavoritesController::class, 'delete']);


Route::put('/v1/{store_id}/reservitions', [FavoritesController::class, 'post']);
Route::delete('/v1/{reservation_id}/reservations', [ReservationsController::class, 'delete']);