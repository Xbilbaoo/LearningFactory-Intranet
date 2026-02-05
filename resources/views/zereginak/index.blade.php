<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zereginen Kudeaketa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- 1. MENSAJES DE ÉXITO (Feedback al usuario) --}}
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                    <p class="font-bold">Ondo!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            {{-- BOTÓN CREAR --}}
            @if(Auth::user()->role === 'admin')
                <div class="flex justify-end mb-4">
                    <a href="{{ route('zereginak.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition duration-150 ease-in-out flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Zeregina Sortu
                    </a>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Izena</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Egoera</th> {{-- Nueva columna --}}
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fasea / Taldea</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Arduraduna</th> {{-- Nueva columna --}}
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Epea</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Akzioak</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($zereginak as $zeregina)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                {{-- IZENA --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $zeregina->izena }}</div>
                                    <div class="text-sm text-gray-500 truncate w-48">{{ $zeregina->deskribapena }}</div>
                                </td>

                                {{-- EGOERA (STATUS) con colores --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $statusColor = match($zeregina->status) {
                                            'Eginda' => 'bg-green-100 text-green-800',
                                            'Egiten' => 'bg-blue-100 text-blue-800',
                                            default => 'bg-yellow-100 text-yellow-800', // Pendiente
                                        };
                                    @endphp
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                        {{ $zeregina->status }}
                                    </span>
                                </td>

                                {{-- FASEA Y TALDEA --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $zeregina->fasekoaDa->izena ?? '-' }}</div>
                                    <div class="text-sm text-gray-500">{{ $zeregina->taldeakEginBeharDu->izena ?? 'Talderik gabe' }}</div>
                                </td>

                                {{-- ARDURADUNA --}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $zeregina->arduradunaDa->izena ?? '' }} {{ $zeregina->arduradunaDa->abizena ?? '-' }}
                                </td>

                                {{-- EPEA (Formato fecha amigable) --}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($zeregina->amaieraData)->format('d/m/Y') }}
                                </td>

                                {{-- AKZIOAK --}}
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-3">
                                        {{-- Ver / Editar --}}
                                        <a href="{{ route('zereginak.edit', $zeregina) }}" class="text-indigo-600 hover:text-indigo-900 font-bold">
                                            Editatu
                                        </a>

                                        {{-- Borrar --}}
                                        <form action="{{ route('zereginak.destroy', $zeregina) }}" method="POST" onsubmit="return confirm('Ziur zaude zeregina hau ezabatu nahi duzula?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-bold">
                                                Ezabatu
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            {{-- SI NO HAY DATOS --}}
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                    Ez dago zereginik momentu honetan.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
