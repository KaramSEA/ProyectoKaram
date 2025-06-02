<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudRestaurante extends Model
{
    protected $table = 'solicitudes_restaurantes';

    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'tipo_cocina',
        'telefono',
        'descripcion',
        'email_contacto',
        'certificado_halal',
        'estado',
        'mensaje_admin',
        'google_maps_url',
    ];
}
