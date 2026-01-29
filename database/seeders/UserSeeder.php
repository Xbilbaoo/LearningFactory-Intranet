<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Hash; // No es necesario gracias a tu cast 'hashed'

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Crear un usuario específico para pruebas (Admin/Desarrollador)
        // Usamos create() directamente ya que tu modelo tiene los fillables correctos.
        User::create([

            'email' => 'admin@prueba.com',
            'password' => 'password123', // Se encriptará automático por el cast en tu modelo
            'role' => 'admin',
            'email_verified_at' => now()
        ]);

        User::create([

            'email' => 'arduraduna@prueba.com',
            'password' => 'password123', // Se encriptará automático por el cast en tu modelo
            'role' => 'arduraduna',
            'email_verified_at' => now()
        ]);

        User::create([

            'email' => 'ikaslea@prueba.com',
            'password' => 'password123', // Se encriptará automático por el cast en tu modelo
            'role' => 'ikaslea',
            'email_verified_at' => now()
        ]);
    }
}
