<?php

namespace Database\Seeders;

use App\Models\Ikaslea;
use Illuminate\Database\Seeder;

class IkasleaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ikaslea por defecto
        Ikaslea::updateOrCreate(
            ['email' => 'ikaslea@example.com'],
            [
                'izena'     => 'Ikasle',
                'abizena'   => 'Demo',
                'pasahitza' => bcrypt('password'),
                'rola'      => 'ikaslea',
                'taldeID'   => 1, // ajusta si necesitas un talde existente concreto
            ]
        );
    }
}


