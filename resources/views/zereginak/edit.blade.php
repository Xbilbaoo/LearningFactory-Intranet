<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Zereginen Kudeaketa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(Auth::user()->role === 'admin')
                <div class="mb-4">
                    <a href="{{ route('zereginak.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Zeregina Sortu
                    </a>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full">
                    <thead>
                        <tr class="text-left font-bold">
                            <th class="px-4 py-2">Izena</th>
                            <th class="px-4 py-2">Fasea</th>
                            <th class="px-4 py-2">Taldea</th>
                            <th class="px-4 py-2">Egoera</th>
                            @if(Auth::user()->role !== 'ikaslea')
                                <th class="px-4 py-2">Akzioak</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($zereginak as $zeregina)
                        <tr class="border-b">
                            <td class="px-4 py-2">
                                <a href="{{ route('zereginak.show', $zeregina->zereginID) }}" class="text-blue-600 hover:underline">
                                    {{ $zeregina->izena }}
                                </a>
                            </td>
                            <td class="px-4 py-2">{{ $zeregina->fasekoaDa->izena ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $zeregina->taldeakEginBeharDu->izena ?? '-' }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 text-xs font-bold rounded 
                                    {{ $zeregina->status == 'completed' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                    {{ $zeregina->status }}
                                </span>
                            </td>

                            @if(Auth::user()->role !== 'ikaslea')
                                <td class="px-4 py-2 flex gap-2">
                                    
                                    @if(Auth::user()->role === 'admin' || (Auth::user()->role === 'arduraduna' && Auth::user()->arduraduna && $zeregina->arduradunID == Auth::user()->arduraduna->arduradunID))
                                        <a href="{{ route('zereginak.edit', $zeregina->zereginID) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                                    @endif
                                    
                                    @if(Auth::user()->role === 'admin')
                                        <form action="{{ route('zereginak.destroy', $zeregina->zereginID) }}" method="POST" onsubmit="return confirm('Ziur zaude?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>