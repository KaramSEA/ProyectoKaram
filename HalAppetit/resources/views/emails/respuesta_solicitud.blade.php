<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Respuesta a tu solicitud</title>
</head>
<body>
    <h2>El estado de tu solictud es el siguiente: {{ $estado }}</h2>
    
    <p>{{ $solicitud->nombre }}</p>
    <p>{{ $mensaje }}</p>
    <p>Gracias por confiar en HalAppetit.</p>
</body>
</html>
