@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow space-y-6">
    <h1 class="text-2xl font-bold text-[#1F3A5F]">Añadir Reseña a {{ $restaurante->nombre }}</h1>

    <form method="POST" action="{{ route('reseñas.store', $restaurante->id) }}">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1">Puntuación (1-5)</label>
            <input type="number" name="puntuacion" min="1" max="5" required class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Comentario</label>
            <textarea name="comentario" rows="4" required class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="anonimo" class="mr-2">
                Publicar como Anónimo
            </label>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar Reseña</button>
    </form>
</div>
@endsection
