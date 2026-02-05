<?php

namespace Database\Seeders;

use App\Models\Arduraduna;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArduradunaSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear el Administrador del sistema
        User::firstOrCreate(
            ['email' => 'admin@learningfactory.com'],
            [
                'password' => bcrypt('admin123'),
                'role' => 'admin'
            ]
        );

        // 2. Lista de profesores
        $profesores = [
            ['izena' => 'Mikel', 'abizena' => 'SCLF', 'email' => 'mikel@sclf.com'],
            ['izena' => 'Maitane', 'abizena' => 'SCLF', 'email' => 'maitane@sclf.com'],
            // ... añade el resto aquí
        ];

        foreach ($profesores as $profe) {
            $user = User::firstOrCreate(
                ['email' => $profe['email']],
                [
                    'password' => bcrypt('password123'),
                    'role' => 'arduraduna'
                ]
            );

            Arduraduna::firstOrCreate(
                ['userID' => $user->userID],
                [
                    'izena' => $profe['izena'],
                    'abizena' => $profe['abizena']
                ]
            );
        }
    }
}
