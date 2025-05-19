<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'dni';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['dni', 'nombre', 'apellidos', 'email', 'contrasena'];

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
}

