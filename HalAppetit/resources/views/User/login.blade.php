@extends('layouts.app')

@section('content')


</head>
<body class="bg-gray-100 text-[#1F3A5F]">
    <div class="flex justify-center items-center min-h-screen px-4">
        <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-2xl font-bold text-center mb-6 text-[#1F3A5F]">Iniciar Sesión</h2>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block font-semibold mb-1">Correo electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:border-[#FCC201] focus:ring-1 focus:ring-[#FCC201] @error('email') border-red-500 @enderror"
                        placeholder="Tu correo">
                    @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password" class="block font-semibold mb-1">Contraseña</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:border-[#FCC201] focus:ring-1 focus:ring-[#FCC201] @error('password') border-red-500 @enderror"
                        placeholder="Tu contraseña">
                    @error('password') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit"
                    class="w-full bg-[#FCC201] text-[#1F3A5F] font-bold py-2 px-4 rounded-lg hover:bg-[#e6b000] transition">
                    Acceder
                </button>

                <div class="text-center text-sm mt-4">
                    ¿No tienes cuenta?
                    <a href="{{ route('registro.create') }}" class="text-[#FCC201] hover:underline">
                        Regístrate aquí
                    </a>
                </div>
            </form>
        </div>
    </div>


</body>
</html>
@endsection