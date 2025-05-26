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

    <!-- Anime.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .bg-animate {
            background-size: 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body class="min-h-screen flex flex-col bg-gradient-to-br from-blue-50 to-indigo-100 bg-animate">
    <nav class="bg-white/80 backdrop-blur-md shadow-sm mb-8">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/"
                class="text-xl font-bold text-blue-600 hover:text-blue-800 transition-colors duration-300 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                MyNote
            </a>
            @if (request()->routeIs('welcome') || request()->routeIs('home') || request()->routeIs('index') || request()->routeIs('/'))
            <div class="flex space-x-4">
                <a href="{{ route('login') }}"
                    class="px-4 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300">Login</a>
                <a href="{{ route('register') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium transition-colors duration-300 shadow-sm hover:shadow-md">Register</a>
            </div>
            @endif
        </div>
    </nav>

    <main class="flex-1 flex items-center justify-center p-4">
        {{ $slot }}
    </main>

    <footer class="text-center py-4 text-gray-500 text-sm">
        &copy; {{ date('Y') }} MyNote. All rights reserved.
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animate the logo and nav items
            anime({
                targets: 'nav a',
                translateY: [-20, 0],
                opacity: [0, 1],
                duration: 1000,
                delay: anime.stagger(100),
                easing: 'easeOutExpo'
            });

            // Background gradient animation
            const bgAnimation = anime({
                targets: 'body',
                backgroundPosition: ['0% 50%', '100% 50%'],
                duration: 15000,
                direction: 'alternate',
                loop: true,
                easing: 'easeInOutQuad'
            });
        });
    </script>
</body>

</html>
