<?php

namespace App\Http\Controllers;

use App\Models\ImagenResena;
use App\Models\Restaurante;
use Illuminate\Http\Request;

class ImagenResenaController extends Controller
{
    public function create($restauranteId)
{
    $restaurante = Restaurante::findOrFail($restauranteId);
    $resenas = $restaurante->resenas;

    return view('imagenes_resenas.create', compact('restaurante', 'resenas'));
}

public function store(Request $request, $restauranteId)
{
    $request->validate([
        'resena_id' => 'required|exists:resenas,id',
        'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $path = $request->file('imagen')->store('imagenes_resenas', 'public');

    ImagenResena::create([
        'resena_id' => $request->resena_id,
        'url_imagen' => $path,
    ]);

    return redirect()->route('restaurantes.show', Restaurante::findOrFail($restauranteId)->slug)->with('success', 'Imagen añadida');
}
}