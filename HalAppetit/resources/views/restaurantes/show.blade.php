@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-6 space-y-6">

    <!-- Imagen destacada -->
    @if($restaurante->foto_principal)
        <div>
            <img src="{{ $restaurante->foto_principal }}" alt="Imagen principal del restaurante" class="w-full h-64 object-cover rounded shadow">
        </div>
    @endif

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

    <!-- Galería de Imágenes -->
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

    <!-- Cartas y Promociones -->
    @if($restaurante->cartas->count())
        <div class="bg-white rounded shadow p-6">
            <h2 class="text-2xl font-semibold mb-4">🧾 Cartas / Promociones</h2>

            @foreach($restaurante->cartas as $carta)
                <div class="mb-6 border-b pb-4">
                    <h3 class="text-lg font-bold text-[#1F3A5F]">{{ $carta->titulo }}</h3>
                    <p class="text-gray-700 mb-2">{{ $carta->descripcion }}</p>
                    <a href="{{ asset('storage/' . $carta->archivo) }}" target="_blank" class="text-blue-600 underline hover:text-blue-800">
                        Ver carta/promocion
                    </a>
                    <p class="text-xs text-gray-500 mt-1">Publicado: {{ $carta->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Botones de añadir -->
    <div class="flex gap-4">
        <a href="{{ route('imagenes.create', $restaurante->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Añadir Imagen</a>
        <a href="{{ route('reseñas.create', $restaurante->id) }}" class="bg-green-500 text-white px-4 py-2 rounded">Añadir Reseña</a>
    </div>

    <!-- Botón solo para el dueño -->
    @auth
        @if(auth()->id() === $restaurante->administrador_id) 
            <div class="mt-6">
                <a href="{{ route('cartas.create', $restaurante->id) }}" 
                   class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    ➕ Subir carta o promoción
                </a>
            </div>
        @endif
    @endauth

</div>
@endsection
