<?php

namespace Database\Seeders;

use App\Models\Zeregina;
use App\Models\Fasea;
use App\Models\Taldea;
use App\Models\Arduraduna;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ZereginaSeeder extends Seeder
{
    public function run(): void
    {
        // Buscamos los IDs para no fallar
        $faseSents = Fasea::where('izena', 'Sentsibilizazioa')->first()->faseID ?? 1;
        $faseDis   = Fasea::where('izena', 'Diseinua')->first()->faseID ?? 1;
        $faseMerk  = Fasea::where('izena', 'Merkataritza')->first()->faseID ?? 1;
        $faseProz  = Fasea::where('izena', 'Prozesua')->first()->faseID ?? 1;

        // Función auxiliar para buscar ID de grupo por nombre (o devolver el 1 si no existe)
        $getTaldeID = function($nombre) {
            return Taldea::where('izena', $nombre)->first()->taldeID ?? 1;
        };
        
        // Cogemos un responsable aleatorio para rellenar el dato
        $randomArduradunID = Arduraduna::first()->arduradunID ?? 1;

        $zereginak = [
            // --- Sentsibilizazioa ---
            [
                'izena' => 'SCLF proiektua ezagutu',
                'deskribapena' => 'Urte hasieran Zornotza SCLF precious plastic makina bisitatu.',
                'faseID' => $faseSents,
                'taldeaID' => $getTaldeID('SCLF Arduradunak'),
                'hasieraData' => '2025-10-01', 'amaieraData' => '2025-10-07'
            ],
            // --- Diseinua ---
            [
                'izena' => 'Lan prebentzioen arriskua',
                'deskribapena' => 'SCLF makinaren lan arriskuak analisia egin.',
                'faseID' => $faseDis,
                'taldeaID' => $getTaldeID('IPE1'),
                'hasieraData' => '2025-10-08', 'amaieraData' => '2025-10-15'
            ],
            [
                'izena' => 'Makinaren mahaiak diseinatu',
                'deskribapena' => 'Ikasleak makinaren base eta euskarriak diseinatu.',
                'faseID' => $faseDis,
                'taldeaID' => $getTaldeID('2CM3'),
                'hasieraData' => '2025-10-15', 'amaieraData' => '2025-11-15'
            ],
            [
                'izena' => 'Tolba diseinua',
                'deskribapena' => 'Extrusorearen eta txikitzailearen tolbak diseinatu.',
                'faseID' => $faseDis,
                'taldeaID' => $getTaldeID('2CM3'),
                'hasieraData' => '2025-10-15', 'amaieraData' => '2025-11-15'
            ],
            // --- Merkataritza ---
            [
                'izena' => 'Marketing Plana',
                'deskribapena' => 'Produkturako berariazko marketing plana sortu.',
                'faseID' => $faseMerk,
                'taldeaID' => $getTaldeID('Merkataritza'),
                'hasieraData' => '2025-10-20', 'amaieraData' => '2025-12-01'
            ],
            [
                'izena' => 'WEB ORRIA sortu',
                'deskribapena' => 'SCLF proiektuaren web orria garatu eta inplementatu.',
                'faseID' => $faseMerk,
                'taldeaID' => $getTaldeID('2AW3'), // ¡ESTE ES TU GRUPO!
                'hasieraData' => '2025-10-20', 'amaieraData' => '2025-12-20'
            ],
            // --- Prozesua / Muntaketa ---
            [
                'izena' => 'Motor reductora montaje',
                'deskribapena' => 'Mahai euskarrian muntatu.',
                'faseID' => $faseProz,
                'taldeaID' => $getTaldeID('Mto'),
                'hasieraData' => '2026-01-10', 'amaieraData' => '2026-01-20'
            ],
            [
                'izena' => 'Armairu elektrikoa',
                'deskribapena' => 'Planu elektrikoekin muntatu.',
                'faseID' => $faseProz,
                'taldeaID' => $getTaldeID('Mecatrónica'),
                'hasieraData' => '2026-01-15', 'amaieraData' => '2026-02-01'
            ],
             [
                'izena' => 'Pasaporte Digitala (Blockchain)',
                'deskribapena' => 'SCLF-ren prozesuaren trazabilidadea ziurtatu.',
                'faseID' => $faseMerk, // O Web
                'taldeaID' => $getTaldeID('2AW3'),
                'hasieraData' => '2025-12-01', 'amaieraData' => '2026-01-30'
            ],
        ];

        foreach ($zereginak as $zeregina) {
            Zeregina::create(array_merge($zeregina, [
                'estimazioa' => rand(10, 50),
                'zereginPosizioa' => 1,
                'status' => 'pending',
                'arduradunID' => $randomArduradunID // Asignamos un profe cualquiera por ahora
            ]));
        }
    }
}