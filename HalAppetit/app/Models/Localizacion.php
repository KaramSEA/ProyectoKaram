<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Localizacion extends Model
{
    use HasFactory;

    protected $table = 'localizaciones';
    public $timestamps = false;

    protected $fillable = ['user_id', 'restaurante_id', 'distancia'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }
}
