<?php
namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemaController extends Controller
{
    // Mostrar lista de temas
    public function index()
    {
        $temas = Tema::latest()->with('autor')->get();
        return view('foro.index', compact('temas'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('foro.create');
    }

    // Guardar nuevo tema
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required',
        ]);

        Tema::create([
            'user_id' => Auth::id(),
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
        ]);

        return redirect()->route('foro.index')->with('success', 'Tema publicado correctamente.');
    }

    // Ver un tema con respuestas
    public function show($id)
    {
        $tema = Tema::with(['autor', 'respuestas.autor'])->findOrFail($id);
        return view('foro.show', compact('tema'));
    }
}
