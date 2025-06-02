@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Solicitudes de Restaurantes Halal</h1>

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Nombre</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Teléfono</th>
                <th class="border px-4 py-2">Dirección</th>
                <th class="border px-4 py-2">Ciudad</th>
                <th class="border px-4 py-2">Tipo de Cocina</th>
                <th class="border px-4 py-2">Descripción</th>
                <th class="border px-4 py-2">Url GoogleMaps</th>
                <th class="border px-4 py-2">Certificado</th>
                <th class="border px-4 py-2">Estado</th>
                <th class="border px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $solicitud)
            <tr>
                <td class="border px-4 py-2">{{ $solicitud->nombre }}</td>
                <td class="border px-4 py-2">{{ $solicitud->email_contacto }}</td>
                <td class="border px-4 py-2">{{ $solicitud->telefono }}</td>
                <td class="border px-4 py-2">{{ $solicitud->direccion }}</td>
                <td class="border px-4 py-2">{{ $solicitud->ciudad }}</td>
                <td class="border px-4 py-2">{{ $solicitud->tipo_cocina }}</td>
                <td class="border px-4 py-2">{{ $solicitud->descripcion }}</td>
                <td class="border px-4 py-2">
                    @if($solicitud->google_maps_url)
                        <a href="{{ $solicitud->google_maps_url }}" target="_blank" class="text-blue-600 underline">Ver en Google Maps</a>
                    @else
                        Sin ubicación
                    @endif
                </td>
                <td class="border px-4 py-2">
                    <a href="{{ asset('storage/' . $solicitud->certificado_halal) }}" target="_blank" class="text-blue-600 underline">Ver</a>
                </td>
                <td class="border px-4 py-2">{{ ucfirst($solicitud->estado) }}</td>
                <td class="border px-4 py-2 flex gap-2">
                    <form method="POST" action="{{ route('admin.solicitudes.responder', $solicitud->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="estado" value="aceptado">
                        <button class="bg-green-500 text-white px-3 py-1 rounded">Aceptar</button>
                    </form>
                    <form method="POST" action="{{ route('admin.solicitudes.responder', $solicitud->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="estado" value="rechazado">
                        <button class="bg-red-500 text-white px-3 py-1 rounded">Rechazar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection