<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurante_id',
        'titulo',
        'descripcion',
        'archivo',
    ];

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }
}
