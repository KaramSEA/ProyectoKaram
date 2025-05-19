<?php

use App\Http\Controllers\ImagenResenaController;
use App\Http\Controllers\ResenaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\UserController;

// Rutas públicas
Route::get('/', [RestauranteController::class, 'index'])->name('inicio');
Route::get('/restaurantes', [RestauranteController::class, 'listado'])->name('restaurantes.index');
Route::get('/restaurantes/{slug}', [RestauranteController::class, 'show'])->name('restaurantes.show');

// Rutas de autenticación
Route::get('/registro', [UserController::class, 'create'])->name('registro.create');
Route::post('/registro', [UserController::class, 'store'])->name('registro.store');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.store');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::delete('/logout', [UserController::class, 'destroy'])->name('logout');
    
    Route::get('/restaurantes/{restaurante}/imagenes/crear', [ImagenResenaController::class, 'create'])
        ->name('imagenes.create');
    Route::post('/restaurantes/{restaurante}/imagenes', [ImagenResenaController::class, 'store'])
        ->name('imagenes.store');
    
    Route::get('/restaurantes/{restaurante}/reseñas/crear', [ResenaController::class, 'create'])
        ->name('reseñas.create');
    Route::post('/restaurantes/{restaurante}/reseñas', [ResenaController::class, 'store'])
        ->name('reseñas.store');
});