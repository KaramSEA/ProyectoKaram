<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurante;

class RestauranteSeeder extends Seeder
{
    public function run(): void
    {
        // Restaurante::create([
        //     'nombre' => 'Al-Andalus',
        //     'direccion' => 'Calle Lavapiés, 12',
        //     'ciudad' => 'Madrid',
        //     'latitud' => 40.40800000,
        //     'longitud' => -3.70200000,
        //     'tipo_cocina' => 'Marroquí',
        //     'descripcion' => 'Especialidades halal de Marruecos, couscous, tajines y dulces árabes.',
        //     'telefono' => '+34 600 123 456',
        //     'foto_principal' => 'https://www.aramultimedia.com/lib/timThumb/timThumb.php?src=/upload/images/Articles-Externs/Javi-Navarro/restaurante-arabe.jpg&w=800&zc=2&a=c',
        //     'administrador_id' => '12345678A', // este DNI debe existir en la tabla `usuarios`
        // ]);
        Restaurante::create([
            'nombre' => 'Sabores del Desierto',
            'direccion' => 'Calle Embajadores, 45',
            'ciudad' => 'Madrid',
            'latitud' => 40.40420000,
            'longitud' => -3.70350000,
            'tipo_cocina' => 'Túnez',
            'descripcion' => 'Restaurante familiar con platos tradicionales tunecinos halal como brik, couscous y harissa.',
            'telefono' => '+34 611 234 567',
            'foto_principal' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/13/dd/1f/73/p-20180726-214945-largejpg.jpg?w=900&h=-1&s=1',
            'administrador_id' => '12345678A',
        ]);
        
        Restaurante::create([
            'nombre' => 'El Oasis Halal',
            'direccion' => 'Calle Atocha, 89',
            'ciudad' => 'Madrid',
            'latitud' => 40.41000000,
            'longitud' => -3.69500000,
            'tipo_cocina' => 'Libanesa',
            'descripcion' => 'Experiencia auténtica de la cocina libanesa con ingredientes 100% halal y ambiente acogedor.',
            'telefono' => '+34 622 987 654',
            'foto_principal' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2d/27/b6/44/chez-michel-el-libanes.jpg?w=900&h=500&s=1',
            'administrador_id' => '12345678A',
        ]);
        
    }
}
