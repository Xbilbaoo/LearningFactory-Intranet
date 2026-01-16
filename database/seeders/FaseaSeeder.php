<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class FaseaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faseas')->insert([
            [
                'izena' => 'Sentsibilizazioa',
                'deskribapena' => 'Proiektua ezagutzeko fasea',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'izena' => 'Diseinua',
                'deskribapena' => 'Proiektuaren diseinuak garatzeko fasea',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'izena' => 'Fabrikazioa',
                'deskribapena' => 'Proiektua garatzen den fasea',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'izena' => 'Prozesua',
                'deskribapena' => 'Garapenaren azken pausuak',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'izena' => 'Bukaera',
                'deskribapena' => 'Egiaztapenak eta proiektuaren entrega',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
