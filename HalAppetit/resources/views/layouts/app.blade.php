<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halappetit</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

    @include('partes.header')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('partes.footer')

    @yield('scripts')
</body>
</html>
