<?php

namespace App\Http\Controllers;

use App\Models\Fasea;
use App\Models\Taldea;
use App\Models\Arduraduna;
use App\Http\Requests\StoreZereginaRequest;
use App\Http\Requests\UpdateZereginaRequest;
use App\Models\Zeregina;
use Illuminate\Support\Facades\Auth;

class ZereginaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // 1. Iniciamos la consulta base cargando relaciones
        $query = Zeregina::with(['fasekoaDa', 'taldeakEginBeharDu', 'arduradunaDa']);

        // 2. Aplicamos filtros según el ROL

        if ($user->role === 'admin') {
            // ADMIN: Lo ve todo. No filtramos nada.

        } elseif ($user->role === 'arduraduna') {
            // ARDURADUNA: Solo ve las tareas donde él es el responsable.
            // Asumimos que la relación $user->arduraduna funciona correctamente.
            if ($user->arduraduna) {
                $query->where('arduradunID', $user->arduraduna->arduradunID);
            } else {
                // Si el usuario tiene rol arduraduna pero no tiene ficha en la tabla 'arduradunas'
                $query->whereRaw('0 = 1'); // Truco para devolver lista vacía
            }
        } elseif ($user->role === 'ikaslea') {
            // IKASLEA: Solo ve las de su grupo Y que no estén completadas (activas)
            if ($user->ikaslea) {
                $query->where('taldeaID', $user->ikaslea->taldeaID)
                    ->whereIn('status', ['pending', 'in_progress']); // Asumo que estas son las "activas"
            } else {
                $query->whereRaw('0 = 1');
            }
        }

        // 3. Ejecutamos la consulta final
        $zereginak = $query->get();

        return view('zereginak.index', compact('zereginak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faseak = Fasea::all();
        $taldeak = Taldea::all();
        $arduradunak = Arduraduna::all();

        return view('zereginak.create', compact('faseak', 'taldeak', 'arduradunak'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreZereginaRequest $request)
    {
        Zeregina::create($request->validate());
        return redirect()->route('zereginak.index')->with('success', 'Zeregina ondo sortu da!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Zeregina $zeregina)
    {
        return view('zereginak.show', compact('zeregina'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zeregina $zeregina)
    {

        $user = Auth::user();

        // BLOQUEO DE SEGURIDAD
        if ($user->role === 'ikaslea') {
            abort(403); // Prohibido
        }
        if ($user->role === 'arduraduna') {
            // Si es responsable, verificamos que sea SU tarea
            if (!$user->arduraduna || $zeregina->arduradunID !== $user->arduraduna->arduradunID) {
                abort(403, 'Ez daukazu baimenik zeregin hau editatzeko.');
            }
        }

        $faseak = Fasea::all();
        $taldeak = Taldea::all();
        $arduradunak = Arduraduna::all();

        return view('zereginak.edit', compact('zeregina', 'faseak', 'taldeak', 'arduradunak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateZereginaRequest $request, Zeregina $zeregina)
    {
        $zeregina->update($request->validated());

        return redirect()->route('zereginak.index')->with('success', 'Zeregina ondo eguneratu da');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zeregina $zeregina)
    {
        $zeregina->delete();

        return redirect()->route('zereginak.index')->with('success', 'Zeregina ezabatu egin da.');
    }
}
