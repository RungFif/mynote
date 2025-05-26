<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyNote - Beautiful Notes App</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-DbTWgVAB.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50/50 via-white to-purple-100/50 relative overflow-x-hidden">
    <!-- Floating Background Elements -->

    <!-- Animated Navbar -->
    <nav class="bg-white/80 shadow-xl backdrop-blur-lg sticky top-0 z-50 transition-all duration-500 border-b border-white/30"
        id="main-nav">
        <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
            <!-- Logo with Animation -->
            <a href="/" class="group relative flex items-center select-none">
                <span
                    class="text-3xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600 tracking-tight relative z-10">
                    <defs>
                        <linearGradient id="paint0_linear" x1="0" y1="0" x2="38" y2="38"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#3B82F6" />
                            <stop offset="1" stop-color="#A78BFA" />
                        </linearGradient>
                    </defs>
                    </svg>
                    MyNote
                </span>
                <span></span>
            </a>

            <!-- Burger Menu Button (Mobile) -->
            <button id="burger-menu" class="md:hidden flex flex-col justify-center items-center w-10 h-10 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 group relative z-20 bg-white/70 shadow-lg transition-all duration-300">
                <span class="block w-6 h-0.5 bg-blue-600 mb-1.5 transition-all duration-300"></span>
                <span class="block w-6 h-0.5 bg-blue-600 mb-1.5 transition-all duration-300"></span>
                <span class="block w-6 h-0.5 bg-blue-600 transition-all duration-300"></span>
            </button>

            <!-- Navigation Links -->
            <div id="nav-links" class="hidden md:flex items-center space-x-6 md:static absolute top-16 left-0 w-full md:w-auto bg-white/90 md:bg-transparent shadow-xl md:shadow-none rounded-b-xl md:rounded-none px-6 md:px-0 py-6 md:py-0 transition-all duration-500 z-10">
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="nav-link group relative text-gray-700 hover:text-blue-700 font-medium transition-colors duration-300">
                        <span class="relative z-10 flex items-center">
                            <i class="fas fa-tachometer-alt mr-2 text-blue-500 opacity-70 group-hover:opacity-100 transition-opacity"></i>
                            Dashboard
                        </span>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="nav-link group relative text-red-600 hover:text-red-800 font-medium transition-colors duration-300">
                            <span class="relative z-10 flex items-center">
                                <i class="fas fa-sign-out-alt mr-2 text-red-500 opacity-70 group-hover:opacity-100 transition-opacity"></i>
                                Logout
                            </span>
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 group-hover:w-full transition-all duration-300"></span>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="nav-link group relative text-gray-700 hover:text-blue-700 font-medium transition-colors duration-300">
                        <span class="relative z-10 flex items-center">
                            <i class="fas fa-sign-in-alt mr-2 text-blue-500 opacity-70 group-hover:opacity-100 transition-opacity"></i>
                            Login
                        </span>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('register') }}"
                        class="nav-link register-btn px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:from-blue-700 hover:to-purple-700">
                        <span class="relative z-10 flex items-center">
                            <i class="fas fa-user-plus mr-2"></i>
                            Register
                        </span>
                        <span class="absolute inset-0 rounded-full bg-white/10 opacity-0 hover:opacity-100 transition-opacity duration-300"></span>
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="relative z-10">
        @yield('content')
    </main>

    <!-- Animated Footer -->
    <footer class="bg-white/80 backdrop-blur-lg border-t border-white/30 mt-16 py-8 relative z-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <a href="/"
                        class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">MyNote</a>
                    <p class="text-gray-600 text-sm mt-1">Capture your thoughts beautifully</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#"
                        class="social-icon text-gray-600 hover:text-blue-600 transition-colors duration-300">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    <a href="#"
                        class="social-icon text-gray-600 hover:text-purple-600 transition-colors duration-300">
                        <i class="fab fa-github text-lg"></i>
                    </a>
                    <a href="#"
                        class="social-icon text-gray-600 hover:text-red-600 transition-colors duration-300">
                        <i class="fab fa-youtube text-lg"></i>
                    </a>
                </div>
            </div>
            <div class="mt-6 pt-6 border-t border-gray-200/50 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} MyNote App. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Floating Cursor Effect -->
    <div id="cursor-effect"
        class="fixed w-6 h-6 rounded-full bg-blue-400/20 pointer-events-none z-50 transform -translate-x-1/2 -translate-y-1/2">
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Enhanced Navbar Animation
            anime({
                targets: '#main-nav',
                translateY: [-80, 0],
                opacity: [0, 1],
                duration: 1200,
                easing: 'easeOutElastic(1, .8)'
            });

            // Main Content Animation
            anime({
                targets: 'main',
                opacity: [0, 1],
                translateY: [30, 0],
                duration: 900,
                delay: 800,
                easing: 'easeOutExpo'
            });

            // Staggered Navigation Links Animation
            anime({
                targets: '.nav-link',
                opacity: [0, 1],
                translateX: [-20, 0],
                delay: anime.stagger(100, {
                    start: 1000
                }),
                duration: 800,
                easing: 'easeOutExpo'
            });

            // Special Register Button Animation
            const registerBtn = document.querySelector('.register-btn');
            if (registerBtn) {
                anime({
                    targets: registerBtn,
                    scale: [0.8, 1],
                    opacity: [0, 1],
                    delay: 1600,
                    duration: 1000,
                    easing: 'easeOutElastic(1, .8)'
                });

                registerBtn.addEventListener('mouseenter', () => {
                    anime({
                        targets: registerBtn,
                        scale: 1.05,
                        duration: 300,
                        easing: 'easeOutBack'
                    });
                });

                registerBtn.addEventListener('mouseleave', () => {
                    anime({
                        targets: registerBtn,
                        scale: 1,
                        duration: 500,
                        easing: 'easeOutElastic(1, .5)'
                    });
                });
            }

            // Footer Animation
            anime({
                targets: 'footer',
                opacity: [0, 1],
                translateY: [50, 0],
                delay: 1200,
                duration: 800,
                easing: 'easeOutExpo'
            });

            // Social Icons Animation
            anime({
                targets: '.social-icon',
                scale: [0, 1],
                opacity: [0, 1],
                delay: anime.stagger(100, {
                    start: 1500
                }),
                duration: 800,
                easing: 'easeOutBack'
            });

            // Background Blobs Animation
            const blobs = document.querySelectorAll('.animate-blob');
            blobs.forEach(blob => {
                anime({
                    targets: blob,
                    translateX: () => anime.random(-100, 100),
                    translateY: () => anime.random(-100, 100),
                    scale: [1, 1.2],
                    duration: () => anime.random(10000, 15000),
                    direction: 'alternate',
                    loop: true,
                    easing: 'easeInOutSine'
                });
            });

            // Hover effects for nav links
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('mouseenter', () => {
                    anime({
                        targets: link,
                        translateY: -2,
                        duration: 200,
                        easing: 'easeOutSine'
                    });
                });
                link.addEventListener('mouseleave', () => {
                    anime({
                        targets: link,
                        translateY: 0,
                        duration: 300,
                        easing: 'easeOutElastic(1, .5)'
                    });
                });
            });

            // Burger menu toggle
            const burger = document.getElementById('burger-menu');
            const navLinks = document.getElementById('nav-links');
            let open = false;
            burger.addEventListener('click', function() {
                open = !open;
                if (open) {
                    navLinks.classList.remove('hidden');
                    navLinks.classList.add('flex', 'animate__animated', 'animate__fadeInDown');
                    anime({
                        targets: navLinks,
                        opacity: [0, 1],
                        translateY: [-30, 0],
                        duration: 600,
                        easing: 'easeOutExpo'
                    });
                    // Animate burger to X
                    burger.children[0].style.transform = 'rotate(45deg) translateY(8px)';
                    burger.children[1].style.opacity = '0';
                    burger.children[2].style.transform = 'rotate(-45deg) translateY(-8px)';
                } else {
                    anime({
                        targets: navLinks,
                        opacity: [1, 0],
                        translateY: [0, -30],
                        duration: 400,
                        easing: 'easeInExpo',
                        complete: function() {
                            navLinks.classList.add('hidden');
                            navLinks.classList.remove('flex', 'animate__animated', 'animate__fadeInDown');
                        }
                    });
                    // Animate X to burger
                    burger.children[0].style.transform = '';
                    burger.children[1].style.opacity = '1';
                    burger.children[2].style.transform = '';
                }
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

        .animation-delay-6000 {
            animation-delay: 6s;
        }

        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(99, 102, 241, 0.4);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(99, 102, 241, 0.6);
        }
    </style>
</body>

</html>
