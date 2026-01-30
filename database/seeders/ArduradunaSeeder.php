<?php

namespace Database\Seeders;

use App\Models\Arduraduna;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ArduradunaSeeder extends Seeder
{
    public function run(): void
    {
        // Lista de profesores basada en tu Excel (Maitane, Mikel, etc.)
        // Creamos un User para cada uno para que puedan loguearse
        $profesores = [
            ['izena' => 'Mikel', 'abizena' => 'SCLF', 'email' => 'mikel@sclf.com'],
            ['izena' => 'Maitane', 'abizena' => 'SCLF', 'email' => 'maitane@sclf.com'],
            ['izena' => 'Irakaslea', 'abizena' => 'IPE1', 'email' => 'ipe1@sclf.com'],
            ['izena' => 'Irakaslea', 'abizena' => '2CM3', 'email' => '2cm3@sclf.com'],
            ['izena' => 'Irakaslea', 'abizena' => '2AW3', 'email' => '2aw3@sclf.com'], // Tu profe
            ['izena' => 'Irakaslea', 'abizena' => 'Mto', 'email' => 'mto@sclf.com'],
        ];

        foreach ($profesores as $profe) {
            // 1. Primero creamos (o buscamos) su Usuario (Login)
            $user = User::firstOrCreate(
                ['email' => $profe['email']], 
                [
                    'password' => 'password123', // Contraseña genérica
                    'role' => 'arduraduna'
                ]
            );

            // 2. Luego creamos la ficha de Arduraduna vinculada a ese usuario
            // Nota: Si tu tabla arduradunas no tiene columna 'user_id', quita esa línea.
            // Pero viendo tus modelos anteriores, parece que sí están vinculados.
            Arduraduna::firstOrCreate(
                ['izena' => $profe['izena'], 'abizena' => $profe['abizena']],
                // Si tienes una columna para vincularlos (ej: userID), descomenta esto:
                // ['userID' => $user->userID] 
            );
        }

        // También nos aseguramos de que el usuario de prueba "arduraduna@prueba.com" 
        // del UserSeeder tenga su ficha de Arduraduna
        $adminUser = User::where('email', 'arduraduna@prueba.com')->first();
        if ($adminUser) {
            Arduraduna::firstOrCreate([
                'izena' => 'Admin',
                'abizena' => 'Nagusia',
                // 'userID' => $adminUser->userID 
            ]);
        }
    }
}