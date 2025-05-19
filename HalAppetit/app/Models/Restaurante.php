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
        'administrador_id',
    ];

    public function administrador()
    {
        return $this->belongsTo(User::class, 'administrador_id', 'dni');
    }

    public function resenas()
    {
        return $this->hasMany(Resena::class);
    }

    public function localizaciones()
    {
        return $this->hasMany(Localizacion::class);
    }
   

    // esto se hace para que al momento de crear un restaurante se le asigne un slug automaticamente
    public static function boot()
    {
        parent::boot();

        static::creating(function ($restaurante) {
            $restaurante->slug = Str::slug($restaurante->nombre);
        });
    }

}
