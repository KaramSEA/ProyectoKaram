<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resena extends Model
{
    use HasFactory;

    protected $table = 'resenas';
    public $timestamps = false;

    // CAMBIA usuario_dni por user_id
    protected $fillable = ['restaurante_id', 'usuario_id', 'nombre_anonimo', 'puntuacion', 'comentario', 'fecha'];

    public function usuario()
    {
        // CAMBIA la relación para usar user_id con users.id
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }

    public function imagenes()
    {
        return $this->hasMany(ImagenResena::class, 'resena_id');
    }
}
