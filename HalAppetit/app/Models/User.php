<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory; // esto es para que se pueda usar el factory

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'dni',
        'nombre',
        'apellidos',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relaciones si las tienes
    public function restaurantes()
    {
        return $this->hasMany(Restaurante::class, 'administrador_id', 'dni');
    }

    public function resenas()
    {
        return $this->hasMany(Resena::class, 'usuario_dni', 'dni');
    }

    public function localizaciones()
    {
        return $this->hasMany(Localizacion::class, 'usuario_dni', 'dni');
    }
    public function getAuthPassword()
    {
        return $this->password;
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
