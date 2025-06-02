<?php

namespace App\Http\Controllers;

use App\Models\SolicitudRestaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class SolicitudRestauranteController extends Controller
{
    public function index()
    {
        $solicitudes = SolicitudRestaurante::latest()->get();
        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    // Mostrar el formulario
    public function create()
    {
        return view('solicitudes.create');
    }
    public function show($id)
    {
        $solicitud = SolicitudRestaurante::findOrFail($id);
        return view('admin.solicitudes.show', compact('solicitud'));
    }

    public function aceptar($id, Request $request)
    {
        $solicitud = SolicitudRestaurante::findOrFail($id);
        $solicitud->estado = 'aceptada';
        $solicitud->mensaje_admin = $request->mensaje;
        $solicitud->save();

        Mail::to($solicitud->email_contacto)->send(new \App\Mail\SolicitudAceptada($solicitud));

        return redirect()->route('admin.solicitudes.index')->with('success', 'Solicitud aceptada y correo enviado.');
    }

    public function rechazar($id, Request $request)
    {
        $solicitud = SolicitudRestaurante::findOrFail($id);
        $solicitud->estado = 'rechazada';
        $solicitud->mensaje_admin = $request->mensaje;
        $solicitud->save();

        Mail::to($solicitud->email_contacto)->send(new \App\Mail\SolicitudRechazada($solicitud));

        return redirect()->route('admin.solicitudes.index')->with('success', 'Solicitud rechazada y correo enviado.');
    }



    // Guardar la solicitud
    public function store(Request $request)
    {
    $request->validate([
        'nombre' => 'required|string|max:255',
        'direccion' => 'required|string',
        'ciudad' => 'required|string',
        'tipo_cocina' => 'required|string',
        'descripcion' => 'nullable|string',
        'telefono' => 'nullable|string|max:20',
        'google_maps_url' => 'nullable|url', // Cambiado de 'enlace_googleMaps'
        'certificado_halal' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'email_contacto' => 'required|email',
    ], [
        // Mensajes personalizados para cada regla de validación
        'nombre.required' => 'El nombre del restaurante es obligatorio',
        'direccion.required' => 'La dirección es obligatoria',
        'ciudad.required' => 'La ciudad es obligatoria',
        'tipo_cocina.required' => 'El tipo de cocina es obligatorio',
        'telefono.max' => 'El teléfono no debe exceder los 20 caracteres',
        'google_maps_url.url' => 'La URL de Google Maps debe ser válida',
        'certificado_halal.required' => 'El certificado Halal es obligatorio',
        'certificado_halal.mimes' => 'El certificado debe ser PDF, JPG, JPEG o PNG',
        'certificado_halal.max' => 'El certificado no debe superar los 2MB',
        'email_contacto.required' => 'El email de contacto es obligatorio',
        'email_contacto.email' => 'Debe proporcionar un email válido',
    ]);

        // Guardar el archivo en storage/app/public/certificados
        $certificadoPath = $request->file('certificado_halal')->store('certificados', 'public');

        // Crear solicitud
        SolicitudRestaurante::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
            'tipo_cocina' => $request->tipo_cocina,
            'telefono' => $request->telefono,
            'descripcion' => $request->descripcion,
            'google_maps_url' => $request->google_maps_url, // Usando el nombre correcto
            'email_contacto' => $request->email_contacto,
            'certificado_halal' => $certificadoPath,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('inicio')->with('success', 'Tu solicitud ha sido enviada correctamente.');
    }
}
