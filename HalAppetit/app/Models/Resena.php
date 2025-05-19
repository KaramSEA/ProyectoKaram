<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resena extends Model
{
    use HasFactory;

    protected $table = 'resenas';
    public $timestamps = false;

    protected $fillable = ['restaurante_id', 'usuario_dni', 'nombre_anonimo', 'puntuacion', 'comentario', 'fecha'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_dni', 'dni');
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
