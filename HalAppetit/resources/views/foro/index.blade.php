@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Foro de HalAppetit</h1>

    <a href="{{ route('foro.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
        + Crear nuevo tema
    </a>

    @foreach($temas as $tema)
        <div class="bg-white shadow rounded p-4 mb-3">
            <a href="{{ route('foro.show', $tema->id) }}" class="text-xl font-semibold text-blue-700 hover:underline">
                {{ $tema->titulo }}
            </a>
            <p class="text-sm text-gray-500">Publicado por {{ $tema->autor->nombre }} el {{ $tema->created_at->format('d/m/Y H:i') }}</p>
        </div>
    @endforeach
</div>
@endsection
