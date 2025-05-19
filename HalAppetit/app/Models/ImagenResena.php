<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImagenResena extends Model
{
    use HasFactory;

    protected $table = 'imagenes_resenas';
    public $timestamps = false;

    protected $fillable = ['resena_id', 'url_imagen', 'descripcion'];

    public function resena()
    {
        return $this->belongsTo(Resena::class, 'resena_id');
    }
}

