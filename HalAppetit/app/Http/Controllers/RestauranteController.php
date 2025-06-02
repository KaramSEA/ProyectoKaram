<?php

namespace App\Http\Controllers;

use App\Models\Resena;
use Illuminate\Http\Request;
use App\Models\Restaurante; // Import the Restaurante model

class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        $restaurantes = Restaurante::take(3)->get(); // esto se hace para cargar solo 3 restaurantes
        $ultimasResenas = Resena::inRandomOrder()->take(3)->get(); //  3 reseñas aleatorias

        return view('inicio', compact('restaurantes', 'ultimasResenas'));
    }
    // esta funcion se encarga de mostrar la vista de un restaurante en especifico
    public function show($slug)
    {
        $restaurante = Restaurante::with(['resenas.imagenes', 'cartas'])->where('slug', $slug)->firstOrFail();

        $mediaReseñas = $restaurante->resenas->avg('puntuacion');

        return view('restaurantes.show', compact('restaurante', 'mediaReseñas'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function listado()
    {
        $restaurantes = Restaurante::all();
        return view('restaurantes.index', compact('restaurantes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
