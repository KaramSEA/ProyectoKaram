@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Crear nuevo tema</h1>

    <form method="POST" action="{{ route('foro.store') }}">
        @csrf

        <label class="block mb-2 font-semibold">Título</label>
        <input type="text" name="titulo" class="w-full border p-2 mb-4" required>

        <label class="block mb-2 font-semibold">Contenido</label>
        <textarea name="contenido" rows="6" class="w-full border p-2 mb-4" required></textarea>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Publicar</button>
    </form>
</div>
@endsection
