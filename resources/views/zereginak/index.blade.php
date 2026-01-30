<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Zereginen Kudeaketa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-4">
                <a href="{{ route('zereginak.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Zeregina Sortu
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full">
                    <thead>
                        <tr class="text-left font-bold">
                            <th class="px-4 py-2">Izena</th>
                            <th class="px-4 py-2">Fasea</th>
                            <th class="px-4 py-2">Taldea</th>
                            <th class="px-4 py-2">Epea</th>
                            <th class="px-4 py-2">Akzioak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($zereginak as $zeregina)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $zeregina->izena }}</td>
                            <td class="px-4 py-2">
                                {{ $zeregina->fasekoaDa->izena ?? 'Esleitu gabe' }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $zeregina->taldeakEginBeharDu->izena ?? '...' }}
                            </td>
                            <td class="px-4 py-2">{{ $zeregina->amaieraData }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('zereginak.edit', $zeregina) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                                
                                <form action="{{ route('zereginak.destroy', $zeregina) }}" method="POST" onsubmit="return confirm('Ziur zaude?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>