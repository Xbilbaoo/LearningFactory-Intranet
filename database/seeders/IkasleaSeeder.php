<?php

namespace Database\Seeders;

use App\Models\Ikaslea;
use App\Models\User;
use App\Models\Taldea;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class IkasleaSeeder extends Seeder
{
    public function run(): void
    {
        // Helper para buscar ID de grupo por nombre (o devolver 1 por defecto)
        $getTaldeID = function($nombre) {
            return Taldea::where('izena', 'LIKE', "%{$nombre}%")->first()?->taldeID ?? 1;
        };

        $ikasleak = [
            // Alumno 1 del grupo 2AW3
            ['izena' => 'Unai', 'abizena' => 'Pérez', 'email' => 'unai@ikasle.com', 'taldea' => '2AW3'],
            // Alumno 2 del grupo 2AW3
            ['izena' => 'Ane', 'abizena' => 'López', 'email' => 'ane@ikasle.com', 'taldea' => '2AW3'],

            // Alumnos de Mecatrónica
            ['izena' => 'Iker', 'abizena' => 'Ruiz', 'email' => 'iker@ikasle.com', 'taldea' => 'Meca'],
            ['izena' => 'Amaia', 'abizena' => 'García', 'email' => 'amaia@ikasle.com', 'taldea' => 'Meca'],

            // Alumnos de Mantenimiento
            ['izena' => 'Jon', 'abizena' => 'Etxeberria', 'email' => 'jon@ikasle.com', 'taldea' => 'Mto'],
        ];

        foreach ($ikasleak as $data) {
            // 1. Crear el Usuario
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'password' => Hash::make('password123'), // Contraseña para todos
                    'role' => 'ikaslea'
                ]
            );

            // 2. Crear la ficha de Ikaslea vinculada
            Ikaslea::firstOrCreate(
                ['userID' => $user->userID], // Evitar duplicados
                [
                    'izena' => $data['izena'],
                    'abizena' => $data['abizena'],
                    'taldeID' => $getTaldeID($data['taldea']), // Asignamos su grupo
                ]
            );
        }
    }
}
