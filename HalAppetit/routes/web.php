<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartaController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\ImagenResenaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ResenaController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\TemaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\SolicitudRestauranteController;
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

//solicitud de restaurante
Route::get('/solicitar-restaurante', [SolicitudRestauranteController::class, 'create'])->name('solicitudes.create');
Route::post('/solicitar-restaurante', [SolicitudRestauranteController::class, 'store'])->name('solicitudes.store');


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

    Route::get('/perfil', [PerfilController::class, 'show'])->name('perfil.show');
    Route::get('/perfil/editar', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::put('/perfil/editar', [PerfilController::class, 'update'])->name('perfil.update');

    // Rutas para el foro 
    Route::get('/foro', [TemaController::class, 'index'])->name('foro.index');
    Route::get('/foro/crear', [TemaController::class, 'create'])->name('foro.create');
    Route::post('/foro', [TemaController::class, 'store'])->name('foro.store');
    Route::get('/foro/{id}', [TemaController::class, 'show'])->name('foro.show');
    Route::post('/foro/{id}/responder', [RespuestaController::class, 'store'])->name('respuestas.store');

    // Rutas para gestionar favoritos
    Route::middleware('auth')->post('/favorito/{restaurante}', [FavoritoController::class, 'toggle'])->name('favorito.toggle');

    // Rutas para gestionar cartas y promociones
    Route::get('/mis-restaurantes/{restaurante}/carta/nueva', [CartaController::class, 'create'])->name('cartas.create');
    Route::post('/mis-restaurantes/{restaurante}/carta', [CartaController::class, 'store'])->name('cartas.store');
    

});


// Rutas protegidas por autenticación y rol de administrador
Route::middleware(['auth', 'admin.only'])->prefix('admin')->group(function () {
    Route::get('/restaurantes', [AdminController::class, 'index'])->name('admin.restaurantes');

    Route::get('/restaurantes/crear', [AdminController::class, 'create'])->name('admin.restaurantes.create');
    Route::post('/restaurantes', [AdminController::class, 'store'])->name('admin.restaurantes.store');

    Route::get('/restaurantes/{id}/editar', [AdminController::class, 'edit'])->name('admin.restaurantes.edit');
    Route::put('/restaurantes/{id}', [AdminController::class, 'update'])->name('admin.restaurantes.update');

    Route::delete('/restaurantes/{id}', [AdminController::class, 'destroy'])->name('admin.restaurantes.destroy');

    // Rutas para gestionar solicitudes de restaurantes
    Route::get('/admin/solicitudes', [SolicitudRestauranteController::class, 'index'])->name('admin.solicitudes.index');
    Route::get('/admin/solicitudes/{id}', [SolicitudRestauranteController::class, 'show'])->name('admin.solicitudes.show');
    
    // Aceptar o rechazar solicitudes
    Route::post('/admin/solicitudes/{id}/aceptar', [SolicitudRestauranteController::class, 'aceptar'])->name('admin.solicitudes.aceptar');
    Route::post('/admin/solicitudes/{id}/rechazar', [SolicitudRestauranteController::class, 'rechazar'])->name('admin.solicitudes.rechazar');

    // Ver solicitudes pendientes
    Route::get('/admin/solicitudes', [AdminController::class, 'verSolicitudes'])->name('admin.solicitudes.index');

    // esta ruta es para responder a las solicitudes de restaurantes
    Route::put('/admin/solicitudes/{id}/responder', [AdminController::class, 'responderSolicitud'])->name('admin.solicitudes.responder');





});
