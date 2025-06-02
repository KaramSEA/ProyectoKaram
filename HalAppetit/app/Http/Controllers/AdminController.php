<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\RespuestaSolicitudHalal;
use App\Models\SolicitudRestaurante;
use App\Models\User;
use App\Notifications\NuevoRestauranteNotificacion;
use Illuminate\Notifications\Notifiable;

class AdminController extends Controller
{
    use Notifiable;
    public function create()
    {
        return view('admin.create_restaurante');
    }
    public function index()
    {
        $restaurantes = Restaurante::all();
        return view('admin.index', compact('restaurantes'));
    }
    public function edit($id)
    {
        $restaurante = Restaurante::findOrFail($id);
        $usuarios = User::all();
        return view('admin.edit_restaurante', compact('restaurante', 'usuarios'));
    }
    public function verSolicitudes()
    {
        $solicitudes = \App\Models\SolicitudRestaurante::orderBy('created_at', 'desc')->get();
        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    public function responderSolicitud(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:aceptado,rechazado',
            'mensaje' => 'nullable|string', // Opcional: permite un mensaje del administrador
        ]);

        $solicitud = SolicitudRestaurante::findOrFail($id);
        $solicitud->estado = $request->estado;
        $solicitud->mensaje_admin = $request->mensaje; // Guarda el mensaje del admin
        $solicitud->save();

        // Enviar email usando la clase Mailable correcta
        if ($request->estado === 'aceptado') {
            Mail::to($solicitud->email_contacto)->send(new \App\Mail\SolicitudAceptada($solicitud));
        } elseif ($request->estado === 'rechazado') {
            Mail::to($solicitud->email_contacto)->send(new \App\Mail\SolicitudRechazada($solicitud));
        }

        return redirect()->route('admin.solicitudes.index')->with('success', 'Respuesta enviada correctamente.');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string',
            'ciudad' => 'required|string',
            'tipo_cocina' => 'required|string',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'descripcion' => 'nullable|string|max:1000',
            'telefono' => 'nullable|string|max:20',
            'foto_principal' => 'required',
            
        ]);

        $restaurante = Restaurante::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
            'tipo_cocina' => $request->tipo_cocina,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'descripcion' => $request->descripcion,
            'telefono' => $request->telefono,
            'foto_principal' => $request->foto_principal,
            'administrador_id' => Auth::id(),
        ]);
        // 🔔 Aquí añadimos la notificación
        $usuarios = User::all();
        foreach ($usuarios as $usuario) {
            $usuario->notify(new NuevoRestauranteNotificacion($restaurante));
        }

        return redirect()->route('admin.restaurantes')->with('success', 'Restaurante creado con éxito.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string',
            'ciudad' => 'required|string',
            'tipo_cocina' => 'required|string',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'descripcion' => 'nullable|string',
            'telefono' => 'nullable|string|max:20',
            'foto_principal' => 'nullable|string',
            'administrador_id' => 'required|exists:users,id',

        ]);

        $restaurante = Restaurante::findOrFail($id);
        $restaurante->update([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
            'tipo_cocina' => $request->tipo_cocina,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'descripcion' => $request->descripcion,
            'telefono' => $request->telefono,
            'foto_principal' => $request->foto_principal,
            'administrador_id' => $request->administrador_id,

        ]);

        return redirect()->route('admin.restaurantes')->with('success', 'Restaurante actualizado correctamente.');
    }

    public function destroy($id)
    {
        $restaurante = Restaurante::findOrFail($id);
        $restaurante->delete();

        return redirect()->route('admin.restaurantes')->with('success', 'Restaurante eliminado correctamente.');
    }
}
