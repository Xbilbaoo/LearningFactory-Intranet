<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Zeregina Editatu: {{ $zeregina->izena }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('zereginak.update', $zeregina) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-4">
                        <label for="izena" class="block text-gray-700 text-sm font-bold mb-2">Izena:</label>
                        <input type="text" name="izena" id="izena"
                               value="{{ old('izena', $zeregina->izena) }}"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        @error('izena') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskribapena" class="block text-gray-700 text-sm font-bold mb-2">Deskribapena:</label>
                        <textarea name="deskribapena" id="deskribapena" rows="3"
                                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('deskribapena', $zeregina->deskribapena) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="faseID" class="block text-gray-700 text-sm font-bold mb-2">Fasea:</label>
                            <select name="faseID" id="faseID" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach($faseak as $fasea)
                                    <option value="{{ $fasea->faseID }}" {{ $zeregina->faseID == $fasea->faseID ? 'selected' : '' }}>
                                        {{ $fasea->izena }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="taldeID" class="block text-gray-700 text-sm font-bold mb-2">Taldea:</label>
                            <select name="taldeID" id="taldeID" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach($taldeak as $taldea)
                                    <option value="{{ $taldea->taldeID }}" {{ $zeregina->taldeID == $taldea->taldeID ? 'selected' : '' }}>
                                        {{ $taldea->izena }}
                                    </option>
                                @endforeach
                            </select>
                            @error('taldeID') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="arduradunID" class="block text-gray-700 text-sm font-bold mb-2">Arduraduna:</label>
                        <select name="arduradunID" id="arduradunID" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach($arduradunak as $arduraduna)
                                <option value="{{ $arduraduna->arduradunID }}" {{ $zeregina->arduradunID == $arduraduna->arduradunID ? 'selected' : '' }}>
                                    {{ $arduraduna->izena }} {{ $arduraduna->abizena }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Egoera:</label>
                        <select name="status" id="status" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Pendiente" {{ $zeregina->status == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="Abian" {{ $zeregina->status == 'Abian' ? 'selected' : '' }}>Abian</option>
                            <option value="Eginda" {{ $zeregina->status == 'Eginda' ? 'selected' : '' }}>Eginda</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="hasieraData" class="block text-gray-700 text-sm font-bold mb-2">Hasiera Data:</label>
                            <input type="date" name="hasieraData" id="hasieraData"
                                   value="{{ old('hasieraData', $zeregina->hasieraData) }}"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="amaieraData" class="block text-gray-700 text-sm font-bold mb-2">Amaiera Data:</label>
                            <input type="date" name="amaieraData" id="amaieraData"
                                   value="{{ old('amaieraData', $zeregina->amaieraData) }}"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('zereginak.index') }}" class="text-gray-500 hover:text-gray-800 font-bold">
                            Utzi
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Eguneratu
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
