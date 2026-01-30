<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Taldea;

class TaldeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taldeak = [
            ['izena' => 'SCLF Arduradunak', 'deskribapena' => 'Proiektuaren kudeatzaile orokorrak'],
            ['izena' => 'IPE1', 'deskribapena' => 'Lan arriskuen prebentzioa'],
            ['izena' => '2CM3', 'deskribapena' => 'Diseinu mekanikoa eta egiturak'],
            ['izena' => 'Merkataritza', 'deskribapena' => 'Marketing taldea'],
            ['izena' => '2AW3', 'deskribapena' => 'Web Garapena eta Informatika'],
            ['izena' => 'Mto', 'deskribapena' => 'Muntaketa eta Mantentze lanak'],
            ['izena' => 'Mecatrónica', 'deskribapena' => 'Mekatronika eta elektrizitatea'],
        ];

        foreach ($taldeak as $taldea) {
            Taldea::firstOrCreate(['izena' => $taldea['izena']], $taldea);
        }
    }
}
