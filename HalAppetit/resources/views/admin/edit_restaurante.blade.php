@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-10">
    <h2 class="text-2xl font-bold text-[#1F3A5F] mb-6 text-center">Editar Restaurante</h2>

    <form action="{{ route('admin.restaurantes.update', $restaurante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1 text-[#1F3A5F]">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $restaurante->nombre) }}" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1 text-[#1F3A5F]">Dirección</label>
            <input type="text" name="direccion" value="{{ old('direccion', $restaurante->direccion) }}" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1 text-[#1F3A5F]">Ciudad</label>
            <input type="text" name="ciudad" value="{{ old('ciudad', $restaurante->ciudad) }}" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1 text-[#1F3A5F]">Tipo de cocina</label>
            <input type="text" name="tipo_cocina" value="{{ old('tipo_cocina', $restaurante->tipo_cocina) }}" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1 text-[#1F3A5F]">Descripción</label>
            <textarea name="descripcion" class="w-full p-2 border rounded">{{ old('descripcion', $restaurante->descripcion) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1 text-[#1F3A5F]">Teléfono</label>
            <input type="text" name="telefono" value="{{ old('telefono', $restaurante->telefono) }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1 text-[#1F3A5F]">Latitud</label>
            <input type="text" name="latitud" value="{{ old('latitud', $restaurante->latitud) }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1 text-[#1F3A5F]">Longitud</label>
            <input type="text" name="longitud" value="{{ old('longitud', $restaurante->longitud) }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1 text-[#1F3A5F]">URL de la imagen principal</label>
            <input type="text" name="foto_principal" value="{{ old('foto_principal', $restaurante->foto_principal) }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-6">
            <label class="block font-semibold mb-1 text-[#1F3A5F]">Propietario del restaurante</label>
            <select name="administrador_id" class="w-full p-2 border rounded">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $restaurante->administrador_id == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->nombre }} ({{ $usuario->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-[#FCC201] text-[#1F3A5F] px-4 py-2 rounded hover:bg-yellow-400 transition">
                Guardar cambios
            </button>
        </div>
    </form>
</div>
@endsection
