<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TaldeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('taldeas')->insert([
            [
                'izena' => '2CM3',
                'deskribapena' => 'Bigarren mailako soldadurako taldea',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
