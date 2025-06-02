<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurante;
use Illuminate\Support\Str;

class RestauranteSeeder extends Seeder
{
    public function run(): void
    {
        Restaurante::create([
            'nombre' => 'Restaurante Malak',
                'direccion' => 'C. Picasso, 3',
                'ciudad' => 'Parla',
                'latitud' => 40.2442397681949, 
                'longitud' => -3.7591914937641113,
                'tipo_cocina' => 'Marroquí',
                'descripcion' => 'Especialidades marroquíes en un ambiente acogedor.',
                'telefono' => '912345678',
                'foto_principal' => 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqOz2F5J51R_3Qw-uv9yhs8SNtuS2Ng_U6yR8_Q_TXFIM856C5wApGia_uLTMyW5f_PuZhTs0DVaFz7GNU0Ab0lI8NWPIuveLCOr8eP-vyVtXIpZk6grxtunnc7G5DVTCZToN5HlQ=w408-h306-k-no',
                'administrador_id' => 3,
                'slug' => Str::slug('Restaurante Malak'),
        ]);
        Restaurante::create([
            'nombre' => 'Restaurante Argana',
                'direccion' => 'C. París, 24',
                'ciudad' => 'Parla',
                'latitud' => 40.2412990479212, 
                'longitud' => -3.752056237070218, 
                'tipo_cocina' => 'Marroquí',
                'descripcion' => 'Auténtica cocina marroquí con un toque moderno.',
                'telefono' => '912349678',
                'foto_principal' => 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrei_5-9A_fHd9I0_EXXfZczfiZxWtAdkkR_uY7BIBD79qyA8YFlFZd_rD8gbZYoWXjVV8VAZtzpEZ2tJI8G-nUU6gMSx2qiLYQZsgLdWefC5joRN1GEhWw4x3vEhWPZQO0h-x4=w408-h305-k-no',
                'administrador_id' => 3,
                'slug' => Str::slug('Restaurante Argana'),
        ]);
        Restaurante::create([
            'nombre' => 'Restaurante Sultan',
                'direccion' => 'POL. IND. LOS BORRACHITOS, C. Moriles, 1',
                'ciudad' => 'Parla',
                'latitud' => 40.25472749315567,  
                'longitud' => -3.758284224386025, 
                'tipo_cocina' => 'Marroquí',
                'descripcion' => 'Un oasis de sabores marroquíes a las afueras de Parla.',
                'telefono' => '912375678',
                'foto_principal' => 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4npwDR6tlKw9nmtVLsCOV7g-S-5tApUm9pMfnsd7uU1soHiFkKr8KgLD044Rqr8zm_Z8kXomz8IZGgaQYpAZo-RdkXv2yfgrVkW2bPfvTNhMEWjhfrErXN3WEc8gqqKwnzuUH2OiDg=w408-h306-k-no',
                'administrador_id' => 3,
                'slug' => Str::slug('Restaurante Sultan'),
        ]);
    }
}
