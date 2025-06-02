@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-2">{{ $tema->titulo }}</h1>
    <p class="text-sm text-gray-500">Publicado por {{ $tema->autor->name }} el {{ $tema->created_at->format('d/m/Y H:i') }}</p>
    <div class="mt-4 mb-6">
        <p>{{ $tema->contenido }}</p>
    </div>

    <h2 class="text-lg font-semibold mb-2">Respuestas</h2>
    @forelse($tema->respuestas as $respuesta)
        <div class="border-t pt-2 mt-2">
            <p class="text-sm text-gray-800">{{ $respuesta->contenido }}</p>
            <p class="text-xs text-gray-500">Respuesta de {{ $respuesta->autor->nombre }} el {{ $respuesta->created_at->format('d/m/Y H:i') }}</p>
        </div>
    @empty
        <p class="text-gray-500">No hay respuestas aún.</p>
    @endforelse

    <hr class="my-4">

    <form action="{{ route('respuestas.store', $tema->id) }}" method="POST">
        @csrf
        <label class="block font-semibold mb-2">Responder</label>
        <textarea name="contenido" rows="4" class="w-full border p-2 mb-4" required></textarea>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enviar respuesta</button>
    </form>
</div>
@endsection
