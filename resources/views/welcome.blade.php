<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyNote - Welcome</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-DbTWgVAB.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 via-white to-purple-50 min-h-screen flex flex-col">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div
            class="absolute top-1/4 left-1/4 w-64 h-64 bg-gradient-to-r from-blue-100 to-purple-100 rounded-full opacity-20 animate-blob animation-delay-2000 filter blur-3xl">
        </div>
        <div
            class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-gradient-to-br from-pink-100 to-yellow-100 rounded-full opacity-20 animate-blob animation-delay-4000 filter blur-3xl">
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-sm shadow-sm sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <a href="/"
                class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 hover:scale-105 transition-transform duration-300">
                MyNote
            </a>
            @auth
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 hidden sm:inline-block">Welcome, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-2 bg-white border border-blue-200 text-blue-600 px-4 py-2 rounded-lg shadow-sm hover:bg-blue-50 hover:text-blue-700 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl">
            <!-- Animated Title -->
            <h1 id="welcome-title"
                class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 mb-6">
                Welcome to MyNote
            </h1>

            <!-- Subtitle -->
            <p id="welcome-subtitle" class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                A simple, fast, and secure way to manage your notes online.
            </p>

            <!-- Action Buttons - Dynamic based on auth status -->
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                @guest
                    <a href="{{ route('login') }}" id="login-btn"
                        class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl shadow-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 font-semibold text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Login
                    </a>
                    <a href="{{ route('register') }}" id="register-btn"
                        class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-700 border border-blue-200 rounded-xl shadow-lg hover:bg-blue-50 transition-all duration-300 transform hover:scale-105 font-semibold text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8  0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Register
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" id="dashboard-btn"
                        class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl shadow-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 font-semibold text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        Go to Dashboard
                    </a>
                @endguest
            </div>
        </div>
    </main>

    <footer class="text-center py-4 text-gray-500 text-sm">
        &copy; {{ date('Y') }} MyNote. All rights reserved.
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Title animation
            anime({
                targets: '#welcome-title',
                translateY: [-30, 0],
                opacity: [0, 1],
                duration: 1000,
                easing: 'easeOutExpo'
            });

            // Subtitle animation
            anime({
                targets: '#welcome-subtitle',
                translateY: [30, 0],
                opacity: [0, 1],
                duration: 800,
                delay: 300,
                easing: 'easeOutExpo'
            });

            // Button animations
            anime({
                targets: '#login-btn, #register-btn, #dashboard-btn',
                scale: [0.9, 1],
                opacity: [0, 1],
                delay: anime.stagger(100, {
                    start: 600
                }),
                duration: 800,
                easing: 'easeOutBack'
            });

            // Background blobs animation
            const blobs = document.querySelectorAll('.animate-blob');
            blobs.forEach(blob => {
                anime({
                    targets: blob,
                    translateX: () => anime.random(-60, 60),
                    translateY: () => anime.random(-60, 60),
                    scale: [1, 1.15],
                    duration: () => anime.random(9000, 14000),
                    direction: 'alternate',
                    loop: true,
                    easing: 'easeInOutSine'
                });
            });
        });
    </script>

    <style>
        @keyframes blob {

            0%,
            100% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
                transform: rotate(0deg);
            }

            50% {
                border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;
                transform: rotate(180deg);
            }
        }

        .animate-blob {
            animation: blob 15s infinite ease-in-out;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</body>

</html>
