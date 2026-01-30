<?php

namespace App\Http\Controllers;

use App\Models\Fasea;
use App\Models\Taldea;
use App\Models\Arduraduna;
use App\Http\Requests\StoreZereginaRequest;
use App\Http\Requests\UpdateZereginaRequest;
use App\Models\Zeregina;
use Illuminate\Http\Request;

class ZereginaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zereginak = Zeregina::with(['fasekoaDa', 'taldeakEginBeharDu', 'arduradunaDa', 'materialakBeharDitu'])->get();
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
        $faseak = Fasea::all();
        $taldeak = Taldea::all();
        $arduradunak = Arduraduna::all();

        return view('zereginak.edit', compact('faseak', 'taldeak', 'arduradunak'));
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
