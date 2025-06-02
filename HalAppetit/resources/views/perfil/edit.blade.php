@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 shadow rounded">
    <h2 class="text-2xl font-bold mb-4 text-[#1F3A5F]">Editar Perfil</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('perfil.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">DNI</label>
            <input type="text" name="dni" value="{{ old('dni', $user->dni) }}" class="w-full border rounded px-4 py-2">
            @error('dni') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-4 py-2">
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Nueva contraseña (opcional)</label>
            <input type="password" name="password" class="w-full border rounded px-4 py-2">
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Confirmar nueva contraseña</label>
            <input type="password" name="password_confirmation" class="w-full border rounded px-4 py-2">
        </div>

        <button type="submit" class="bg-[#FCC201] text-[#1F3A5F] px-6 py-2 rounded font-bold hover:bg-yellow-400 transition">
            Guardar cambios
        </button>
    </form>
</div>
@endsection
