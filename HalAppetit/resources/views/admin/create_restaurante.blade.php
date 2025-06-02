@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-10">
    <h2 class="text-2xl font-bold mb-4">Nuevo Restaurante</h2>
    <form action="{{ route('admin.restaurantes.store') }}" method="POST">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" class="w-full mb-3 p-2 border rounded">
        <input type="text" name="direccion" placeholder="Dirección" class="w-full mb-3 p-2 border rounded">
        <input type="text" name="ciudad" placeholder="Ciudad" class="w-full mb-3 p-2 border rounded">
        <input type="text" name="tipo_cocina" placeholder="Tipo de Cocina" class="w-full mb-3 p-2 border rounded">
        <textarea name="descripcion" placeholder="Descripción" class="w-full mb-3 p-2 border rounded"></textarea>
        <input type="text" name="telefono" placeholder="Teléfono" class="w-full mb-3 p-2 border rounded">
        <input type="text" name="latitud" placeholder="Latitud" class="w-full mb-3 p-2 border rounded">
        <input type="text" name="longitud" placeholder="Longitud" class="w-full mb-3 p-2 border rounded">
        <input type="text" name="foto_principal" placeholder="URL de la imagen" class="w-full mb-3 p-2 border rounded">

        <button class="bg-yellow-400 px-4 py-2 rounded text-[#1F3A5F]">Crear</button>
    </form>
</div>
@endsection
