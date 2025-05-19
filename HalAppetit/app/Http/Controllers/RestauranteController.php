<?php

namespace App\Http\Controllers;

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
        // $restaurantes = Restaurante::all(); // esto se hace para cargar todos los restaurantes

        return view('inicio', compact('restaurantes'));
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
    public function show(string $id)
    {
        //
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
