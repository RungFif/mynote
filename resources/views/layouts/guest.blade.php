<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50 min-h-screen flex flex-col">
        <nav class="bg-white shadow mb-8">
            <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
                <a href="/" class="text-xl font-bold text-blue-700">MyNote</a>
                <div>
                    <a href="{{ route('login') }}" class="mr-4 text-gray-700 hover:text-blue-700">Login</a>
                    <a href="{{ route('register') }}" class="text-blue-700 hover:underline">Register</a>
                </div>
            </div>
        </nav>
        <main class="flex-1 flex items-center justify-center">
            {{ $slot }}
        </main>
        <footer class="text-center py-4 text-gray-400 text-sm">&copy; {{ date('Y') }} MyNote. All rights reserved.</footer>
    </body>
</html>
