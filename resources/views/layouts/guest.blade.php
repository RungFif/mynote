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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Anime.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes gradientShift {
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

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .bg-animate {
            animation: gradientShift 15s ease infinite;
            background-size: 200% 200%;
            background-image: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #f0f9ff 100%);
        }

        .animate-float {
            animation: float 4s infinite ease-in-out;
        }

        .animate-fade-in {
            animation: fadeIn 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: currentColor;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col bg-animate">
    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div
            class="absolute top-1/4 left-1/4 w-64 h-64 bg-gradient-to-r from-blue-200 to-purple-200 rounded-full opacity-10 filter blur-3xl animate-float animation-delay-2000">
        </div>
        <div
            class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-gradient-to-br from-pink-200 to-yellow-200 rounded-full opacity-10 filter blur-3xl animate-float animation-delay-4000">
        </div>
    </div>

    <!-- Floating Particles -->
    <div id="floating-particles" class="fixed inset-0 z-0 overflow-hidden pointer-events-none"></div>

    <nav class="bg-white/90 backdrop-blur-md shadow-sm mb-8 border-b border-gray-200/30">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" id="logo"
                class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 transition-all duration-300 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                MyNote
            </a>

            @if (request()->routeIs('welcome') ||
                    request()->routeIs('home') ||
                    request()->routeIs('index') ||
                    request()->routeIs('/'))
                <div class="flex space-x-6">
                    <a href="{{ route('login') }}"
                        class="nav-link px-4 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 font-medium transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-[1.02]">
                        <i class="fas fa-user-plus mr-2"></i> Register
                    </a>
                </div>
            @endif
        </div>
    </nav>

    <main class="flex-grow animate-fade-in">
        @yield('content')
    </main>

    <footer class="text-center py-6 text-gray-600 text-sm border-t border-gray-200/30">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-center space-x-6 mb-4">
                <a href="#" class="text-gray-500 hover:text-blue-600 transition-colors duration-300">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-500 hover:text-purple-600 transition-colors duration-300">
                    <i class="fab fa-github"></i>
                </a>
                <a href="#" class="text-gray-500 hover:text-red-600 transition-colors duration-300">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
            &copy; {{ date('Y') }} MyNote. All rights reserved.
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create floating particles
            const particlesContainer = document.getElementById('floating-particles');
            for (let i = 0; i < 30; i++) {
                const particle = document.createElement('div');
                particle.className =
                'absolute rounded-full bg-gradient-to-r from-blue-300 to-purple-300 opacity-20';
                particle.style.width = `${Math.random() * 6 + 2}px`;
                particle.style.height = particle.style.width;
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                particlesContainer.appendChild(particle);

                anime({
                    targets: particle,
                    translateX: () => anime.random(-50, 50),
                    translateY: () => anime.random(-50, 50),
                    duration: () => anime.random(10000, 20000),
                    direction: 'alternate',
                    loop: true,
                    easing: 'easeInOutSine'
                });
            }

            // Logo animation
            anime({
                targets: '#logo',
                translateY: [-15, 0],
                opacity: [0, 1],
                duration: 800,
                easing: 'easeOutExpo'
            });

            // Nav links animation
            anime({
                targets: 'nav a',
                translateY: [-10, 0],
                opacity: [0, 1],
                delay: anime.stagger(100, {
                    start: 300
                }),
                duration: 800,
                easing: 'easeOutExpo'
            });

            // Footer social icons animation
            anime({
                targets: 'footer a',
                translateY: [10, 0],
                opacity: [0, 1],
                delay: anime.stagger(100, {
                    start: 500
                }),
                duration: 800,
                easing: 'easeOutExpo'
            });
        });
    </script>
</body>

</html>
