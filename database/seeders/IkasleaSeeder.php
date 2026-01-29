<?php

namespace Database\Seeders;

use App\Models\Ikaslea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IkasleaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ikaslea::create([
            'izena' => 'ikaslea',
            'abizena' => 'demo',
            'taldeID' => '1',
            'userID' => '3'
        ]);
    }
}
