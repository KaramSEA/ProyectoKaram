@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-6 space-y-6">

    <!-- Info Restaurante -->
    <div class="bg-white rounded shadow p-6 space-y-4">
        <h1 class="text-3xl font-bold text-[#1F3A5F]">{{ $restaurante->nombre }}</h1>
        <p><strong>Dirección:</strong> {{ $restaurante->direccion }}, {{ $restaurante->ciudad }}</p>
        <p><strong>Teléfono:</strong> {{ $restaurante->telefono }}</p>
        <p><strong>Tipo de cocina:</strong> {{ $restaurante->tipo_cocina }}</p>
        <p><strong>Descripción:</strong> {{ $restaurante->descripcion }}</p>

        @if($restaurante->verificado)
            <span class="inline-block text-green-500 font-semibold">✅ Verificado</span>
        @endif
    </div>

    <!-- Media Reseñas -->
    <div class="bg-white rounded shadow p-6">
        <h2 class="text-2xl font-semibold mb-2">Valoración media</h2>
        <p class="text-3xl text-yellow-500">{{ number_format($mediaReseñas, 1) }} ⭐</p>
    </div>

    <!-- Reseñas -->
    <div class="bg-white rounded shadow p-6 space-y-4">
        <h2 class="text-2xl font-semibold mb-4">Reseñas</h2>

        @forelse($restaurante->resenas as $resena)
            <div class="border-b pb-4">
                <p class="text-lg font-semibold">
                    {{ $resena->nombre_anonimo ?? $resena->usuario->nombre }}
                </p>

                <p class="text-yellow-500">{{ $resena->puntuacion }} ⭐</p>
                <p>{{ $resena->comentario }}</p>
            </div>
        @empty
            <p>No hay reseñas todavía.</p>
        @endforelse
    </div>

    <!-- Imágenes del Restaurante -->
    <div class="bg-white rounded shadow p-6">
        <h2 class="text-2xl font-semibold mb-4">Galería de Imágenes</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @php $hayImagenes = false; @endphp

            @foreach($restaurante->resenas as $resena)
                @foreach($resena->imagenes as $imagen)
                    @php $hayImagenes = true; @endphp
                    <img src="{{ asset('storage/' . $imagen->url_imagen) }}" alt="Imagen restaurante" class="w-full h-32 object-cover rounded">
                @endforeach
            @endforeach

            @if(!$hayImagenes)
                <p class="col-span-2 md:col-span-4 text-gray-500">No hay imágenes.</p>
            @endif
        </div>
    </div>

    <!-- Botones de añadir -->
    <div class="flex gap-4">
        <a href="{{ route('imagenes.create', $restaurante->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Añadir Imagen</a>
        <a href="{{ route('reseñas.create', $restaurante->id) }}" class="bg-green-500 text-white px-4 py-2 rounded">Añadir Reseña</a>
    </div>

</div>
@endsection
