@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow space-y-6">
    <h1 class="text-2xl font-bold text-[#1F3A5F]">Subir Imagen a una Reseña de {{ $restaurante->nombre }}</h1>

    <form method="POST" action="{{ route('imagenes.store', $restaurante->id) }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1">Selecciona la Reseña</label>
            <select name="resena_id" class="w-full border rounded px-3 py-2" required>
                @foreach($resenas as $resena)
                    <option value="{{ $resena->id }}">
                        {{ $resena->nombre_anonimo ?? $resena->usuario->nombre }} - {{ Str::limit($resena->comentario, 30) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Seleccionar Imagen</label>
            <input type="file" name="imagen" accept="image/*" required class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Subir Imagen</button>
    </form>
</div>
@endsection
