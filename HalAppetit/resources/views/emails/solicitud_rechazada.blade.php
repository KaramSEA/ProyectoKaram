<h1>Tu solicitud no ha sido aprobada</h1>
<p>Tu restaurante "{{ $solicitud->nombre }}" ha sido rechazado.</p>
@if($solicitud->mensaje_admin)
    <p>Motivo: {{ $solicitud->mensaje_admin }}</p>
@endif
