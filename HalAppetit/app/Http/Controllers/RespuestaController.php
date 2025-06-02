<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RespuestaController extends Controller
{
    public function store(Request $request, $tema_id)
    {
        $request->validate([
            'contenido' => 'required',
        ]);

        Respuesta::create([
            'user_id' => Auth::id(),
            'tema_id' => $tema_id,
            'contenido' => $request->contenido,
        ]);

        return redirect()->route('foro.show', $tema_id)->with('success', 'Respuesta enviada.');
    }
}
