@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Subir carta o promoción para {{ $restaurante->nombre }}</h2>

    <form action="{{ route('cartas.store', $restaurante->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1">Título</label>
            <input type="text" name="titulo" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Descripción</label>
            <textarea name="descripcion" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Archivo (PDF o imagen)</label>
            <input type="file" name="archivo" accept=".pdf,.jpg,.jpeg,.png" class="block w-full">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Subir</button>
    </form>
</div>
@endsection
