@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 mt-10 rounded shadow">
    <h2 class="text-2xl font-bold text-[#1F3A5F] mb-6">Solicitar publicación de restaurante Halal</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-4 mb-4 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('solicitudes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-[#1F3A5F] mb-2">Nombre del restaurante *</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" 
                   class="w-full p-2 border rounded @error('nombre') border-red-500 @enderror" 
                   placeholder="Ej: Restaurante Al-Andalus" required>
            @error('nombre')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-[#1F3A5F] mb-2">Dirección *</label>
            <input type="text" name="direccion" value="{{ old('direccion') }}" 
                   class="w-full p-2 border rounded @error('direccion') border-red-500 @enderror" 
                   placeholder="Ej: Calle Principal 123" required>
            @error('direccion')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-[#1F3A5F] mb-2">Ciudad *</label>
            <input type="text" name="ciudad" value="{{ old('ciudad') }}" 
                   class="w-full p-2 border rounded @error('ciudad') border-red-500 @enderror" 
                   placeholder="Ej: Madrid" required>
            @error('ciudad')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-[#1F3A5F] mb-2">Tipo de cocina *</label>
            <input type="text" name="tipo_cocina" value="{{ old('tipo_cocina') }}" 
                   class="w-full p-2 border rounded @error('tipo_cocina') border-red-500 @enderror" 
                   placeholder="Ej: Cocina marroquí, turca, etc." required>
            @error('tipo_cocina')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-[#1F3A5F] mb-2">Teléfono</label>
            <input type="text" name="telefono" value="{{ old('telefono') }}" 
                   class="w-full p-2 border rounded @error('telefono') border-red-500 @enderror" 
                   placeholder="Ej: +34 912 345 678">
            @error('telefono')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-[#1F3A5F] mb-2">URL de Google Maps</label>
            <input type="url" name="google_maps_url" value="{{ old('google_maps_url') }}" 
                   class="w-full p-2 border rounded @error('google_maps_url') border-red-500 @enderror" 
                   placeholder="Ej: https://goo.gl/maps/...">
            @error('google_maps_url')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-[#1F3A5F] mb-2">Descripción del restaurante</label>
            <textarea name="descripcion" class="w-full p-2 border rounded @error('descripcion') border-red-500 @enderror" 
                      placeholder="Breve descripción de tu restaurante">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-[#1F3A5F] mb-2">Correo de contacto *</label>
            <input type="email" name="email_contacto" value="{{ old('email_contacto') }}" 
                   class="w-full p-2 border rounded @error('email_contacto') border-red-500 @enderror" 
                   placeholder="Ej: contacto@restaurante.com" required>
            @error('email_contacto')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-[#1F3A5F] mb-2">Certificado Halal *</label>
            <input type="file" name="certificado_halal" 
                   class="w-full p-2 border rounded @error('certificado_halal') border-red-500 @enderror" 
                   accept=".pdf,.jpg,.jpeg,.png" required>
            <p class="text-sm text-gray-500 mt-1">Formatos aceptados: PDF, JPG, JPEG, PNG (Máx. 2MB)</p>
            @error('certificado_halal')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-yellow-400 px-4 py-2 rounded text-[#1F3A5F] hover:bg-yellow-300 transition w-full">
            Enviar solicitud
        </button>
    </form>
</div>
@endsection