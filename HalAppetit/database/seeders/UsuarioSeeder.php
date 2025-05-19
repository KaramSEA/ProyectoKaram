<?php

namespace Database\Seeders;
use App\Models\Usuario;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        Usuario::create([
            'dni' => '12345678A',
            'nombre' => 'Ahmed',
            'apellidos' => 'El Karam',
            'email' => 'ahmed@example.com',
            'contrasena' => bcrypt('12345678'),
        ]);
    }
}
