<?php

namespace App\Http\Controllers;

use App\Models\Resena;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'usuario_id' => Auth::id(),
            'nombre_anonimo' => $request->has('anonimo') ? 'Anónimo' : null,
            'puntuacion' => $request->puntuacion,
            'comentario' => $request->comentario,
            'fecha' => now(), // si estás guardando fecha manual
        ]);


        return redirect()->route('restaurantes.show', Restaurante::findOrFail($restauranteId)->slug)->with('success', 'Reseña añadida correctamente');
    }
}