<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyNote - Welcome</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-DbTWgVAB.css') }}">
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
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-blue-700 mb-4">Welcome to MyNote</h1>
            <p class="text-lg text-gray-700 mb-8">A simple, fast, and secure way to manage your notes online.</p>
            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-3 rounded shadow hover:bg-blue-700 font-semibold">Get Started</a>
        </div>
    </main>
    <footer class="text-center py-4 text-gray-400 text-sm">&copy; {{ date('Y') }} MyNote. All rights reserved.</footer>
</body>
</html>
