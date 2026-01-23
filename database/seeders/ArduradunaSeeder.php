<?php

namespace Database\Seeders;

use App\Models\Arduraduna;
use Illuminate\Database\Seeder;

class ArduradunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario con rol Arduraduna
        Arduraduna::updateOrCreate(
            ['email' => 'arduraduna@example.com'],
            [
                'izena'      => 'Arduradun',
                'abizena'    => 'Demo',
                'pasahitza'  => bcrypt('password'),
                'rola'       => 'Arduraduna',
            ]
        );

        // Usuario con rol Admin
        Arduraduna::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'izena'      => 'Admin',
                'abizena'    => 'Demo',
                'pasahitza'  => bcrypt('password'),
                'rola'       => 'Admin',
            ]
        );
    }
}


