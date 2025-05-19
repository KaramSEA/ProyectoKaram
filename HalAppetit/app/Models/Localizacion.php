<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Localizacion extends Model
{
    use HasFactory;

    protected $table = 'localizaciones';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = ['usuario_dni', 'restaurante_id'];
    protected $keyType = 'string';

    protected $fillable = ['usuario_dni', 'restaurante_id', 'distancia'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_dni', 'dni');
    }

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }
}
    
