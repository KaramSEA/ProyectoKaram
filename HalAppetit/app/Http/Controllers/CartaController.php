<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use App\Models\Restaurante;
use App\Notifications\CartaSubidaNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CartaController extends Controller
{
    // Mostrar formulario
    public function create($restaurante_id)
    {
        $restaurante = Restaurante::findOrFail($restaurante_id);

        // Solo el dueño del restaurante puede acceder
        if ($restaurante->administrador_id !== Auth::id()) {
            abort(403);
        }

        return view('cartas.create', compact('restaurante'));
    }

    // Guardar carta/promo
    public function store(Request $request, $restaurante_id)
    {
        $restaurante = Restaurante::findOrFail($restaurante_id);

        // Verificar que el usuario autenticado es el dueño del restaurante
        if ($restaurante->administrador_id !== Auth::id()) {
            abort(403);
        }


        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'archivo' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $ruta = $request->file('archivo')->store('cartas', 'public');

        $carta = Carta::create([
            'restaurante_id' => $restaurante->id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'archivo' => $ruta,
        ]);
        // Obtener usuarios que tienen este restaurante como favorito
        $usuarios = $restaurante->usuariosQueLoTienenDeFavorito;

        foreach ($usuarios as $usuario) {
            $usuario->notify(new CartaSubidaNotification($carta));
        }

        return redirect()->route('restaurantes.show', $restaurante->slug)->with('success', 'Carta subida correctamente');
    }
}

