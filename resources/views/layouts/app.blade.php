<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyNote - Simple Notes App</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-DbTWgVAB.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-blue-700">MyNote</a>
            <div>
                @auth
                    <a href="{{ route('dashboard') }}" class="mr-4 text-gray-700 hover:text-blue-700">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600 hover:underline">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="mr-4 text-gray-700 hover:text-blue-700">Login</a>
                    <a href="{{ route('register') }}" class="text-blue-700 hover:underline">Register</a>
                @endauth
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>
