@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto my-12 bg-white shadow rounded-lg p-6">
  <h2 class="text-2xl font-bold text-[#1F3A5F] mb-6 text-center">Tu perfil</h2>

  <div class="space-y-4">
    <div>
      <strong class="text-[#1F3A5F]">Nombre:</strong>
      <p>{{ Auth::user()->nombre }}</p>
    </div>
    <div>
      <strong class="text-[#1F3A5F]">Apellidos:</strong>
      <p>{{ Auth::user()->apellidos }}</p>
    </div>
    <div>
      <strong class="text-[#1F3A5F]">Email:</strong>
      <p>{{ Auth::user()->email }}</p>
    </div>
    <div>
      <strong class="text-[#1F3A5F]">DNI:</strong>
      <p>{{ Auth::user()->dni }}</p>
    </div>
  </div>

  <div class="mt-8 text-center">
    <p class="text-gray-600 mb-3">¿Deseas editar tu perfil?</p>
    <a href="{{ route('perfil.edit') }}" class="bg-[#FCC201] text-[#1F3A5F] px-4 py-2 rounded hover:bg-yellow-400 transition">
      Editar perfil
    </a>
  </div>

  <div class="mt-12">
    <h3 class="text-xl font-semibold text-[#1F3A5F] mb-4">🔔 Tus notificaciones</h3>

    @forelse(auth()->user()->notifications as $notification)
      <div class="flex justify-between items-center bg-gray-100 p-4 mb-3 rounded shadow-sm">
        <div>
          <p class="text-gray-800 font-medium">{{ $notification->data['mensaje'] }}</p>
          <a href="{{ route('restaurantes.show', $notification->data['restaurante_slug']) }}" class="text-sm text-blue-600 hover:underline">
            Ver restaurante
          </a>
        </div>
        <span class="text-xs text-gray-500">
          {{ $notification->created_at->diffForHumans() }}
        </span>
      </div>
    @empty
      <p class="text-gray-500">No tienes notificaciones por el momento.</p>
    @endforelse
  </div>
</div>
@endsection
