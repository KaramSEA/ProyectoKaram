<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestauranteController;

// esta ruta es la principal de la aplicacion y se encarga de mostrar la vista de inicio

Route::get('/', [RestauranteController::class, 'index'])->name('inicio');
