<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'dni',          // sigue siendo un dato, pero no es la clave primaria
        'nombre',
        'apellidos',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // RELACIONES ACTUALIZADAS
    public function restaurantes()
    {
        return $this->hasMany(Restaurante::class, 'administrador_id', 'id');
    }

    public function resenas()
    {
        return $this->hasMany(Resena::class, 'user_id', 'id');
    }

    public function localizaciones()
    {
        return $this->hasMany(Localizacion::class, 'user_id', 'id');
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function temas()
    {
        return $this->hasMany(Tema::class);
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class); // user tiene muchas respuestas
    }
    public function favoritos()
    {
        return $this->hasMany(\App\Models\Favorito::class);
    }

    public function restaurantesFavoritos()
    {
        return $this->belongsToMany(\App\Models\Restaurante::class, 'favoritos');
    }


}
