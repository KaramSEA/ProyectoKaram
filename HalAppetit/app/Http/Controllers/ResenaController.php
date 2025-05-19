<?php

namespace App\Http\Controllers;

use App\Models\Resena;
use App\Models\Restaurante;
use Illuminate\Http\Request;

class ResenaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function create($restauranteId)
    {
        $restaurante = Restaurante::findOrFail($restauranteId);
        return view('resenas.create', compact('restaurante'));
    }

    public function store(Request $request, $restauranteId)
    {
        $request->validate([
            'puntuacion' => 'required|integer|min:1|max:5',
            'comentario' => 'required|string|max:1000',
        ]);

        Resena::create([
            'restaurante_id' => $restauranteId,
            // 'usuario_dni' => auth()->user()->dni, esto deberia de ser asi pero como no funciona el auth
            'usuario_dni' => '12345678A', // Cambia esto por el DNI del usuario autenticado
            'nombre_anonimo' => $request->has('anonimo') ? 'Anónimo' : null,
            'puntuacion' => $request->puntuacion,
            'comentario' => $request->comentario,
            'fecha' => now(), // si estás guardando fecha manual
        ]);


        return redirect()->route('restaurantes.show', Restaurante::findOrFail($restauranteId)->slug)->with('success', 'Reseña añadida correctamente');
    }
}