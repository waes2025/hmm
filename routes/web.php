<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::get('/blog/{slug}', [BlogController::class, 'show']);
Route::get('/category/{slug}', [BlogController::class, 'category']);

Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['admin.auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [RegistrationController::class, 'updateInfo']);

    Route::resource('/category', BlogController::class);
    Route::resource('/posts', BlogController::class);
});
