@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold text-[#1F3A5F] mb-4">Zona de administración</h1>
        <p>Bienvenido, {{ Auth::user()->nombre }}.</p>
        <p class="mt-2">Aquí podrás gestionar tus restaurantes rápidamente.</p>
    </div>
    <div class="flex justify-center mt-6">
        <a href="{{ route('admin.restaurantes.create') }}" class="bg-[#FCC201] hover:bg-yellow-500 text-[#1F3A5F] font-semibold px-5 py-2 rounded shadow">
            + Añadir nuevo restaurante
        </a>
    </div>
    <div class="flex justify-center m-5">
        <a href="{{ route('admin.solicitudes.index') }}" 
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
            Ver solicitudes de restaurantes halal
        </a>

    </div>
    <div class="max-w-4xl mx-auto py-6">
        <h2 class="text-2xl font-bold mb-4">Listado de Restaurantes</h2>

            @foreach($restaurantes as $restaurante)
                <div class="bg-white rounded shadow p-4 mb-4 flex justify-between items-center">
                    <div>
                        <h3 class="font-bold">{{ $restaurante->nombre }}</h3>
                        <p class="text-sm text-gray-600">{{ $restaurante->direccion }} - {{ $restaurante->ciudad }}</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.restaurantes.edit', $restaurante->id) }}" class="text-blue-600 hover:underline">✏️ Editar</a>
                        <form action="{{ route('admin.restaurantes.destroy', $restaurante->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este restaurante?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">🗑️ Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
    </div>

@endsection
