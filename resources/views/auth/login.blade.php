<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Login</title>

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
                transform: translateY(-20px);
            }
        }

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

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .animate-float {
            animation: float 6s infinite ease-in-out;
        }

        .animate-blob {
            animation: blob 15s infinite ease-in-out;
        }

        .animate-pulse {
            animation: pulse 3s infinite ease-in-out;
        }

        .bg-animate {
            animation: gradientShift 15s ease infinite;
            background-size: 200% 200%;
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
    </style>
</head>

<body class="min-h-screen flex flex-col bg-gradient-to-br from-blue-50 via-purple-50 to-indigo-100 bg-animate">
    <!-- Floating Particles -->
    <div id="floating-particles" class="fixed inset-0 z-0 overflow-hidden pointer-events-none"></div>

    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div
            class="absolute top-1/4 left-1/4 w-64 h-64 bg-gradient-to-r from-blue-200 to-purple-200 rounded-full opacity-10 animate-blob animation-delay-2000 filter blur-3xl">
        </div>
        <div
            class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-gradient-to-br from-pink-200 to-yellow-200 rounded-full opacity-10 animate-blob animation-delay-4000 filter blur-3xl">
        </div>
        <div
            class="absolute top-1/3 right-1/3 w-48 h-48 bg-gradient-to-tr from-green-200 to-teal-200 rounded-full opacity-10 animate-blob animation-delay-6000 filter blur-3xl">
        </div>
    </div>

    <nav class="bg-white/80 backdrop-blur-md shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" id="logo"
                class="text-xl font-bold text-blue-600 hover:text-blue-800 transition-colors duration-300 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                MyNote
            </a>
            <div class="flex space-x-4">
                <a href="{{ route('login') }}"
                    class="px-4 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300">Login</a>
                <a href="{{ route('register') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium transition-colors duration-300 shadow-sm hover:shadow-md">Register</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow flex items-center justify-center p-4">
        <div
            class="w-full max-w-md bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden border border-white/30 transform transition-all duration-500 hover:shadow-2xl relative z-10">
            <!-- Decorative Elements -->
            <div
                class="absolute top-0 right-0 w-16 h-16 bg-gradient-to-br from-blue-100 to-purple-100 opacity-20 rounded-bl-2xl">
            </div>
            <div
                class="absolute bottom-0 left-0 w-16 h-16 bg-gradient-to-br from-pink-100 to-yellow-100 opacity-20 rounded-tr-2xl">
            </div>

            <!-- Login Form -->
            <div class="p-8">
                <div class="text-center mb-8">
                    <div
                        class="mx-auto w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center shadow-lg mb-4 animate-float">
                        <i class="fas fa-sign-in-alt text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-extrabold text-gray-900">Welcome Back</h2>
                    <p class="mt-2 text-gray-600">Sign in to your account</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div class="space-y-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white/80 transition-all duration-300"
                                placeholder="you@example.com">
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 bg-white/80 transition-all duration-300"
                                placeholder="••••••••">
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember" type="checkbox"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                        </div>

                        <div class="text-sm">
                            <a href="{{ route('password.request') }}"
                                class="font-medium text-blue-600 hover:text-blue-500 transition-colors duration-300">
                                Forgot password?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" id="login-btn"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-[1.02]">
                            Sign in
                        </button>
                    </div>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                    </div>
                </div>

                <div class="px-8 py-4 bg-gray-50 text-center text-sm text-gray-500">
                    Don't have an account? <a href="{{ route('register') }}"
                        class="font-medium text-blue-600 hover:text-blue-500 transition-colors duration-300">Sign up</a>
                </div>
            </div>
    </main>

    <footer class="text-center py-4 text-gray-500 text-sm">
        &copy; {{ date('Y') }} MyNote. All rights reserved.
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create floating particles
            const particlesContainer = document.getElementById('floating-particles');
            for (let i = 0; i < 30; i++) {
                const particle = document.createElement('div');
                particle.className =
                    'absolute rounded-full bg-gradient-to-r from-blue-300 to-purple-300 opacity-20';
                particle.style.width = `${Math.random() * 8 + 2}px`;
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
                translateY: [-20, 0],
                opacity: [0, 1],
                duration: 800,
                easing: 'easeOutExpo'
            });

            // Nav links animation
            anime({
                targets: 'nav a',
                translateY: [-15, 0],
                opacity: [0, 1],
                delay: anime.stagger(100, {
                    start: 300
                }),
                duration: 800,
                easing: 'easeOutExpo'
            });

            // Form container animation
            anime({
                targets: 'main > div',
                scale: [0.95, 1],
                opacity: [0, 1],
                duration: 1000,
                delay: 500,
                easing: 'easeOutElastic(1, .8)'
            });

            // Form elements animation
            anime({
                targets: 'form > div',
                translateY: [20, 0],
                opacity: [0, 1],
                delay: anime.stagger(100, {
                    start: 800
                }),
                duration: 800,
                easing: 'easeOutExpo'
            });

            // Login button hover effect
            const loginBtn = document.getElementById('login-btn');
            if (loginBtn) {
                loginBtn.addEventListener('mouseenter', () => {
                    anime({
                        targets: loginBtn,
                        scale: 1.03,
                        duration: 300,
                        easing: 'easeOutExpo'
                    });
                });
                loginBtn.addEventListener('mouseleave', () => {
                    anime({
                        targets: loginBtn,
                        scale: 1,
                        duration: 500,
                        easing: 'easeOutElastic(1, .5)'
                    });
                });
            }
        });
    </script>
</body>

</html>
