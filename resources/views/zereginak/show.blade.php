<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Zereginaren Xehetasunak
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">{{ $zeregina->izena }}</h3>
                    <span class="px-3 py-1 rounded text-sm font-bold 
                        {{ $zeregina->status == 'completed' ? 'bg-green-200 text-green-800' : 
                          ($zeregina->status == 'in_progress' ? 'bg-yellow-200 text-yellow-800' : 'bg-gray-200 text-gray-800') }}">
                        {{ strtoupper($zeregina->status) }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-gray-600 text-sm">Deskribapena:</p>
                        <p class="text-lg mb-4">{{ $zeregina->deskribapena }}</p>

                        <p class="text-gray-600 text-sm">Datak:</p>
                        <p class="mb-4">
                            <strong>Hasiera:</strong> {{ \Carbon\Carbon::parse($zeregina->hasieraData)->format('d/m/Y') }} <br>
                            <strong>Amaiera:</strong> {{ \Carbon\Carbon::parse($zeregina->amaieraData)->format('d/m/Y') }}
                        </p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded">
                        <p class="mb-2"><strong>Fasea:</strong> {{ $zeregina->fasekoaDa->izena ?? 'Esleitu gabe' }}</p>
                        <p class="mb-2"><strong>Taldea:</strong> {{ $zeregina->taldeakEginBeharDu->izena ?? 'Esleitu gabe' }}</p>
                        <p class="mb-2"><strong>Arduraduna:</strong> {{ $zeregina->arduradunaDa->izena ?? '' }} {{ $zeregina->arduradunaDa->abizena ?? '' }}</p>
                        <p class="mb-2"><strong>Estimazioa:</strong> {{ $zeregina->estimazioa }} ordu</p>
                    </div>
                </div>

                <div class="mt-8 border-t pt-4 flex gap-4">
                    <a href="{{ route('zereginak.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Atzera
                    </a>
                    <a href="{{ route('zereginak.edit', $zeregina->zereginID) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        Editatu
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>