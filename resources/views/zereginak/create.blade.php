<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Zeregina Sortu
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('zereginak.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700">Zereginaren Izena</label>
                    <input type="text" name="izena" value="{{ old('izena') }}" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Deskribapena</label>
                    <textarea name="deskribapena" class="w-full border p-2 rounded">{{ old('deskribapena') }}</textarea>
                </div>

                <div class="flex gap-4 mb-4">
                    <div class="w-1/2">
                        <label class="block text-gray-700">Hasiera Data</label>
                        <input type="date" name="hasieraData" class="w-full border p-2 rounded">
                    </div>
                    <div class="w-1/2">
                        <label class="block text-gray-700">Amaiera Data</label>
                        <input type="date" name="amaieraData" class="w-full border p-2 rounded">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Arduraduna</label>
                    <select name="arduradunID" class="w-full border p-2 rounded">
                        @foreach($arduradunak as $arduradun)
                            <option value="{{ $arduradun->arduradunID }}">{{ $fase->izena }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Fasea</label>
                    <select name="faseID" class="w-full border p-2 rounded">
                        @foreach($faseak as $fase)
                            <option value="{{ $fase->faseID }}">{{ $fase->izena }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Taldea</label>
                    <select name="taldeID" class="w-full border p-2 rounded">
                        @foreach($taldeak as $talde)
                            <option value="{{ $talde->taldeID }}">{{ $talde->izena }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="status" value="pending">
                <input type="hidden" name="estimazioa" value="5"> <input type="hidden" name="arduraduna_id" value="1"> 

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Gorde
                </button>
            </form>
        </div>
    </div>
</x-app-layout>