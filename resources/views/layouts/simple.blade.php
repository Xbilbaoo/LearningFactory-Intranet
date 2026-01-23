<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Learning Factory'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex flex-col">
        {{-- Barra superior sencilla --}}
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
                <div class="text-lg font-semibold text-gray-800">
                    @yield('brand', config('app.name', 'Learning Factory'))
                </div>

                <nav class="flex gap-4 text-sm text-gray-600">
                    {{-- Aquí puedes poner enlaces básicos de navegación --}}
                    @yield('nav')
                </nav>
            </div>
        </header>

        {{-- Contenido principal --}}
        <main class="flex-1">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>

        {{-- Pie de página sencillo --}}
        <footer class="bg-white border-t">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 text-xs text-gray-500 text-center">
                &copy; {{ date('Y') }} {{ config('app.name', 'Learning Factory') }}
            </div>
        </footer>
    </div>
</body>
</html>


