<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halappetit</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 text-gray-900">

    @include('partes.header') <!-- Aquí sigue llamando a tu header -->

    <main class="min-h-screen">
        @yield('content') <!-- Aquí se inyectará tu contenido -->
    </main>

    @yield('scripts') <!-- Aquí pondrás los scripts de cada página -->

    @include('partes.footer')

</body>
</html>

