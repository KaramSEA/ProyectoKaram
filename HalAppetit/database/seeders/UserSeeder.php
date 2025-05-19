<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'dni' => '12345678A',
            'nombre' => 'Ahmed',
            'apellidos' => 'El Karam',
            'email' => 'ahmed@example.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
