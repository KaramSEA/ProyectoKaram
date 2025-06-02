<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Restaurante extends Model
{
    use HasFactory;

    protected $table = 'restaurantes';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'latitud',
        'longitud',
        'tipo_cocina',
        'descripcion',
        'telefono',
        'foto_principal',
        'administrador_id', // este será un user_id ahora
    ];

    public function administrador()
    {
        return $this->belongsTo(User::class, 'administrador_id', 'id'); // CAMBIADO: de 'dni' a 'id'
    }

    public function resenas()
    {
        return $this->hasMany(Resena::class);
    }

    public function localizaciones()
    {
        return $this->hasMany(Localizacion::class);
    }

    // Generar slug automáticamente
    public static function boot()
    {
        parent::boot();

        static::creating(function ($restaurante) {
            $restaurante->slug = Str::slug($restaurante->nombre);
        });
    }
    public function favoritos()
    {
        return $this->hasMany(\App\Models\Favorito::class);
    }

    public function usuariosQueLoTienenDeFavorito()
    {
        return $this->belongsToMany(\App\Models\User::class, 'favoritos');
    }
    public function cartas()
    {
        return $this->hasMany(\App\Models\Carta::class);
    }

}
