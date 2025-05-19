<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Halappetit</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @include('partes.header') 
</head>
<body class="bg-gray-100 text-gray-800">

    @include('partes.header')

    <div class="max-w-md mx-auto my-8 bg-white p-8 shadow-lg rounded-xl">
        <h2 class="text-2xl font-bold text-center text-[#1F3A5F] mb-6">Crear cuenta en Halappetit</h2>

        @if ($errors->any())
            <div class="mb-4">
                @foreach ($errors->all() as $error)
                    <div class="text-sm text-red-600 bg-red-100 p-2 rounded mb-2">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('registro.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-medium mb-1 text-sm">DNI *</label>
                <input type="text" name="dni" value="{{ old('dni') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-[#FCC201] text-sm">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1 text-sm">Nombre *</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-[#FCC201] text-sm">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1 text-sm">Apellidos *</label>
                <input type="text" name="apellidos" value="{{ old('apellidos') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-[#FCC201] text-sm">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1 text-sm">Correo Electrónico *</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-[#FCC201] text-sm">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1 text-sm">Contraseña *</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-[#FCC201] text-sm">
            </div>

            <div class="mb-6">
                <label class="block font-medium mb-1 text-sm">Confirmar Contraseña *</label>
                <input type="password" name="password_confirmation" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-[#FCC201] text-sm">
            </div>

            <button type="submit" class="w-full bg-[#FCC201] text-[#1F3A5F] font-semibold py-2 rounded hover:bg-yellow-400 transition">Registrarse</button>

            <p class="text-sm text-center mt-4">¿Ya tienes cuenta?
                <a href="{{ route('login') }}" class="text-[#1F3A5F] hover:underline font-medium">Inicia sesión</a>
            </p>
        </form>
    </div>

    @include('partes.footer')

</body>
</html>

