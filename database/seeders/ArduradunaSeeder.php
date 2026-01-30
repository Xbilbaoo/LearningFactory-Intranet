<?php

namespace Database\Seeders;

use App\Models\Arduraduna;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArduradunaSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Lista de profesores (Maitane, Mikel, etc.)
        $profesores = [
            ['izena' => 'Mikel', 'abizena' => 'SCLF', 'email' => 'mikel@sclf.com'],
            ['izena' => 'Maitane', 'abizena' => 'SCLF', 'email' => 'maitane@sclf.com'],
            ['izena' => 'Irakaslea', 'abizena' => 'IPE1', 'email' => 'ipe1@sclf.com'],
            ['izena' => 'Irakaslea', 'abizena' => '2CM3', 'email' => '2cm3@sclf.com'],
            ['izena' => 'Irakaslea', 'abizena' => '2AW3', 'email' => '2aw3@sclf.com'], 
            ['izena' => 'Irakaslea', 'abizena' => 'Mto', 'email' => 'mto@sclf.com'],
            ['izena' => 'Irakaslea', 'abizena' => 'Mecatrónica', 'email' => 'meca@sclf.com'],
        ];

        foreach ($profesores as $profe) {
            // Buscamos o creamos el USUARIO (Login)
            $user = User::firstOrCreate(
                ['email' => $profe['email']], 
                [
                    'password' => 'password123',
                    'role' => 'arduraduna'
                ]
            );

            // Buscamos o creamos la ficha de ARDURADUNA vinculada
            Arduraduna::firstOrCreate(
                ['izena' => $profe['izena'], 'abizena' => $profe['abizena']],
                [
                    // AHORA SÍ: Guardamos el userID porque ya lo añadimos al $fillable
                    'userID' => $user->userID 
                ]
            );
        }

        // Asegurar que el usuario de prueba también es arduraduna
        $adminUser = User::where('email', 'arduraduna@prueba.com')->first();
        if ($adminUser) {
            Arduraduna::firstOrCreate(
                ['izena' => 'Admin', 'abizena' => 'Nagusia'],
                ['userID' => $adminUser->userID]
            );
        }
    }
}