<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fasea;

class FaseaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faseak = [
            ['izena' => 'Sentsibilizazioa', 'deskribapena' => 'Proiektuaren hasiera eta ezagutza'],
            ['izena' => 'Diseinua', 'deskribapena' => 'Planoak, arriskuak eta diseinu teknikoa'],
            ['izena' => 'Merkataritza', 'deskribapena' => 'Marketing eta Web garapena'],
            ['izena' => 'Prozesua', 'deskribapena' => 'Muntaketa eta fabrikazioa (Mto, Mekatronika)'],
        ];

        foreach ($faseak as $fase) {
            Fasea::firstOrCreate(['izena' => $fase['izena']], $fase);
        }
    }
}
