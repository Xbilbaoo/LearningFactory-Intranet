@extends('layouts.simple')

@section('title', config('app.name', 'Learning Factory'))

@section('brand')
    Learning Factory
@endsection

@section('nav')
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/dashboard') }}"
                class="inline-block px-4 py-1.5 rounded-sm text-sm text-gray-700 hover:text-gray-900 border border-gray-300 hover:border-gray-400 bg-white">
                Dashboard
            </a>
        @else
            <a href="{{ route('login') }}"
                class="inline-block px-4 py-1.5 rounded-sm text-sm text-gray-700 hover:text-gray-900 border border-transparent hover:border-gray-300">
                Iniciar sesión
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="inline-block px-4 py-1.5 rounded-sm text-sm text-white bg-orange-500 hover:bg-orange-600">
                    Registrarse
                </a>
            @endif
        @endauth
    @endif
@endsection

@section('content')
    <div class="grid gap-8 lg:grid-cols-2 items-center">
        <div>
            <h1 class="text-3xl font-semibold text-gray-900 mb-3">
                Bienvenido a Learning Factory
            </h1>
            <p class="text-gray-600 mb-6">
                Intranet para gestionar taldeak, ikasleak, zereginak y materiala
                de manera sencilla y centralizada.
            </p>

            <div class="space-y-3 text-sm text-gray-700">
                <div class="flex items-start gap-2">
                    <span class="mt-1 h-2 w-2 rounded-full bg-orange-500"></span>
                    <p>
                        Accede con tu cuenta para ver el panel de control, los grupos y las tareas asignadas.
                    </p>
                </div>
                <div class="flex items-start gap-2">
                    <span class="mt-1 h-2 w-2 rounded-full bg-orange-500"></span>
                    <p>
                        Gestiona fases del proyecto, materiales y responsables desde una única interfaz.
                    </p>
                </div>
            </div>

            <div class="mt-6 flex flex-wrap gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-flex items-center px-5 py-2 rounded-md bg-orange-500 text-white text-sm font-medium hover:bg-orange-600">
                        Ir al panel
                    </a>
                @endauth
            </div>
        </div>

        <div class="hidden lg:block">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-base font-semibold text-gray-900 mb-4">
                    ¿Qué puedes hacer aquí?
                </h2>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li>• Organizar taldeak e ikasleak.</li>
                    <li>• Definir zereginak eta faseak en tus proyectos.</li>
                    <li>• Asignar materiales y proveedores.</li>
                    <li>• Coordinar arduradunak y el seguimiento del proyecto.</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
