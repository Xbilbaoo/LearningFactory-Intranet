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
        // Obtenemos todos los IDs de los responsables disponibles
        $arduradunIDs = Arduraduna::pluck('arduradunID')->toArray();

        // 1. Helpers para buscar IDs sin que falle si no existen
        $getFaseID = function($nombre) {
            return Fasea::where('izena', $nombre)->first()?->faseID ?? 1;
        };

        $getTaldeID = function($nombre) {
            return Taldea::where('izena', 'LIKE', "%{$nombre}%")->first()?->taldeID ?? 1;
        };

        // 2. Definimos las variables que faltaban (ESTO ES LO QUE DABA ERROR)
        $faseSents = $getFaseID('Sentsibilizazioa');
        $faseDis   = $getFaseID('Diseinua');
        $faseMerk  = $getFaseID('Merkataritza');
        $faseProz  = $getFaseID('Prozesua');

        // 3. Obtenemos responsables reales
        $arduradunIDs = Arduraduna::pluck('arduradunID')->toArray();

        // Si no hay responsables, usamos [1] por defecto para evitar errores
        if (empty($arduradunIDs)) {
            $arduradunIDs = [1];
        }

        $zereginak = [
            // --- Sentsibilizazioa ---
            [
                'izena' => 'SCLF proiektua ezagutu',
                'deskribapena' => 'Urte hasieran Zornotza SCLF precious plastic makina bisitatu.',
                'faseID' => $faseSents,
                'taldeID' => $getTaldeID('SCLF'),
                'hasieraData' => '2025-10-01', 'amaieraData' => '2025-10-07'
            ],
            // --- Diseinua ---
            [
                'izena' => 'Lan prebentzioen arriskua',
                'deskribapena' => 'SCLF makinaren lan arriskuak analisia egin.',
                'faseID' => $faseDis,
                'taldeID' => $getTaldeID('IPE1'),
                'hasieraData' => '2025-10-08', 'amaieraData' => '2025-10-15'
            ],
            [
                'izena' => 'Makinaren mahaiak diseinatu',
                'deskribapena' => 'Ikasleak makinaren base eta euskarriak diseinatu.',
                'faseID' => $faseDis,
                'taldeID' => $getTaldeID('2CM3'),
                'hasieraData' => '2025-10-15', 'amaieraData' => '2025-11-15'
            ],
            [
                'izena' => 'Tolba diseinua',
                'deskribapena' => 'Extrusorearen eta txikitzailearen tolbak diseinatu.',
                'faseID' => $faseDis,
                'taldeID' => $getTaldeID('2CM3'),
                'hasieraData' => '2025-10-15', 'amaieraData' => '2025-11-15'
            ],
            // --- Merkataritza ---
            [
                'izena' => 'Marketing Plana',
                'deskribapena' => 'Produkturako berariazko marketing plana sortu.',
                'faseID' => $faseMerk,
                'taldeID' => $getTaldeID('Merkataritza'),
                'hasieraData' => '2025-10-20', 'amaieraData' => '2025-12-01'
            ],
            [
                'izena' => 'WEB ORRIA sortu',
                'deskribapena' => 'SCLF proiektuaren web orria garatu eta inplementatu.',
                'faseID' => $faseMerk,
                'taldeID' => $getTaldeID('2AW3'),
                'hasieraData' => '2025-10-20', 'amaieraData' => '2025-12-20'
            ],
            // --- Prozesua / Muntaketa ---
            [
                'izena' => 'Motor reductora montaje',
                'deskribapena' => 'Mahai euskarrian muntatu.',
                'faseID' => $faseProz,
                'taldeID' => $getTaldeID('Mto'),
                'hasieraData' => '2026-01-10', 'amaieraData' => '2026-01-20'
            ],
            [
                'izena' => 'Armairu elektrikoa',
                'deskribapena' => 'Planu elektrikoekin muntatu.',
                'faseID' => $faseProz,
                'taldeID' => $getTaldeID('Mecatrónica'),
                'hasieraData' => '2026-01-15', 'amaieraData' => '2026-02-01'
            ],
            [
                'izena' => 'Pasaporte Digitala (Blockchain)',
                'deskribapena' => 'SCLF-ren prozesuaren trazabilidadea ziurtatu.',
                'faseID' => $faseMerk,
                'taldeID' => $getTaldeID('2AW3'),
                'hasieraData' => '2025-12-01', 'amaieraData' => '2026-01-30'
            ],
        ];

        foreach ($zereginak as $zeregina) {
            Zeregina::create(array_merge($zeregina, [
                'estimazioa' => rand(10, 50),
                'zereginPosizioa' => 1,
                'status' => 'Pendiente',
                // Asignamos un responsable aleatorio de la lista real
                'arduradunID' => $arduradunIDs[array_rand($arduradunIDs)]
            ]));
        }
    }
}

