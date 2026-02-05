<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zeregina Editatu') }}: {{ $zeregina->izena }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Muestra errores generales si los hay --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <strong>Ene! Zerbait gaizki joan da:</strong>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('zereginak.update', $zeregina) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- IZENA --}}
                    <div class="mb-4">
                        <label for="izena" class="block text-gray-700 text-sm font-bold mb-2">Izena:</label>
                        <input type="text" name="izena" id="izena"
                               value="{{ old('izena', $zeregina->izena) }}"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        @error('izena') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- DESKRIBAPENA --}}
                    <div class="mb-4">
                        <label for="deskribapena" class="block text-gray-700 text-sm font-bold mb-2">Deskribapena:</label>
                        <textarea name="deskribapena" id="deskribapena" rows="4"
                                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('deskribapena', $zeregina->deskribapena) }}</textarea>
                        @error('deskribapena') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        {{-- ESTIMAZIOA (Faltaba antes) --}}
                        <div>
                            <label for="estimazioa" class="block text-gray-700 text-sm font-bold mb-2">Estimazioa (orduak):</label>
                            <input type="number" name="estimazioa" id="estimazioa" min="1"
                                   value="{{ old('estimazioa', $zeregina->estimazioa) }}"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('estimazioa') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- POSIZIOA (Faltaba antes) --}}
                        <div>
                            <label for="zereginPosizioa" class="block text-gray-700 text-sm font-bold mb-2">Posizioa:</label>
                            <input type="number" name="zereginPosizioa" id="zereginPosizioa" min="1"
                                   value="{{ old('zereginPosizioa', $zeregina->zereginPosizioa) }}"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('zereginPosizioa') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        {{-- HASIERA DATA --}}
                        <div>
                            <label for="hasieraData" class="block text-gray-700 text-sm font-bold mb-2">Hasiera Data:</label>
                            <input type="date" name="hasieraData" id="hasieraData"
                                   value="{{ old('hasieraData', $zeregina->hasieraData) }}"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('hasieraData') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- AMAIERA DATA --}}
                        <div>
                            <label for="amaieraData" class="block text-gray-700 text-sm font-bold mb-2">Amaiera Data:</label>
                            <input type="date" name="amaieraData" id="amaieraData"
                                   value="{{ old('amaieraData', $zeregina->amaieraData) }}"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('amaieraData') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        {{-- STATUS --}}
                        <div>
                            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Egoera:</label>
                            <select name="status" id="status" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline">
                                <option value="Pendiente" {{ old('status', $zeregina->status) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="Egiten" {{ old('status', $zeregina->status) == 'Egiten' ? 'selected' : '' }}>Egiten</option>
                                <option value="Eginda" {{ old('status', $zeregina->status) == 'Eginda' ? 'selected' : '' }}>Eginda</option>
                            </select>
                            @error('status') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- FASEA --}}
                        <div>
                            <label for="faseID" class="block text-gray-700 text-sm font-bold mb-2">Fasea:</label>
                            <select name="faseID" id="faseID" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline">
                                @foreach($faseak as $fase)
                                    <option value="{{ $fase->faseID }}" {{ old('faseID', $zeregina->faseID) == $fase->faseID ? 'selected' : '' }}>
                                        {{ $fase->izena }}
                                    </option>
                                @endforeach
                            </select>
                            @error('faseID') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        {{-- TALDEA (Corregido ID vs Izena) --}}
                        <div>
                            <label for="taldeID" class="block text-gray-700 text-sm font-bold mb-2">Taldea:</label>
                            <select name="taldeID" id="taldeID" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline">
                                @foreach($taldeak as $taldea)
                                    <option value="{{ $taldea->taldeID }}" {{ old('taldeID', $zeregina->taldeID) == $taldea->taldeID ? 'selected' : '' }}>
                                        {{ $taldea->izena }}
                                    </option>
                                @endforeach
                            </select>
                            @error('taldeID') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- ARDURADUNA --}}
                        <div>
                            <label for="arduradunID" class="block text-gray-700 text-sm font-bold mb-2">Arduraduna:</label>
                            <select name="arduradunID" id="arduradunID" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline">
                                @foreach($arduradunak as $arduradun)
                                    <option value="{{ $arduradun->arduradunID }}" {{ old('arduradunID', $zeregina->arduradunID) == $arduradun->arduradunID ? 'selected' : '' }}>
                                        {{ $arduradun->izena }} {{ $arduradun->abizena }}
                                    </option>
                                @endforeach
                            </select>
                            @error('arduradunID') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- BOTONES --}}
                    <div class="flex items-center justify-end mt-6 gap-4">
                        <a href="{{ route('zereginak.index') }}" class="text-gray-500 hover:text-gray-800 font-bold px-4 py-2">
                            Utzi
                        </a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline shadow-lg transition duration-150 ease-in-out">
                            Eguneratu
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
