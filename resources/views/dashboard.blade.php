@extends('layouts.app')

@section('content')
    <div class="relative min-h-[60vh] max-w-2xl mx-auto py-12 px-4 md:px-0">
        <!-- Celestial Background Elements -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
            <!-- Twinkling Stars -->
            <div id="stars-container" class="absolute inset-0"></div>

            <!-- Floating Planets -->
            <div
                class="absolute top-1/4 left-1/4 w-48 h-48 bg-gradient-to-r from-blue-100 to-purple-100 rounded-full opacity-10 animate-float animation-delay-2000 filter blur-3xl">
            </div>
            <div
                class="absolute bottom-1/3 right-1/4 w-64 h-64 bg-gradient-to-br from-pink-100 to-yellow-100 rounded-full opacity-10 animate-float animation-delay-4000 filter blur-3xl">
            </div>

            <!-- Shooting Stars -->
            <div class="shooting-star" style="top:15%; left:-100px; animation-delay:3s;"></div>
            <div class="shooting-star" style="top:30%; left:-100px; animation-delay:7s;"></div>
        </div>

        <div class="relative z-10">
            <div id="dashboard-card"
                class="bg-white shadow-2xl rounded-3xl p-8 border border-gray-100 backdrop-blur-sm transform transition-all duration-500 hover:shadow-3xl">
                <!-- Decorative Corner Elements -->
                <div
                    class="absolute top-0 right-0 w-16 h-16 bg-gradient-to-br from-blue-50 to-purple-50 opacity-30 rounded-bl-3xl">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-16 h-16 bg-gradient-to-br from-pink-50 to-yellow-50 opacity-30 rounded-tr-3xl">
                </div>

                <!-- Pulsing Glow Effect -->
                <div
                    class="absolute inset-0 rounded-3xl border-2 border-transparent animate-pulse-glow pointer-events-none">
                </div>

                <h1
                    class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 mb-6 tracking-tight opacity-0 transform">
                    Welcome Back!
                </h1>

                <p class="text-lg text-gray-700 mb-8 opacity-0 transform">
                    Hello, <span class="font-semibold text-purple-600">{{ Auth::user()->name }}</span> 👋
                    <span class="block text-sm text-gray-500 mt-1">Last login:
                        {{ now()->format('M j, Y \a\t g:i A') }}</span>
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('notes.index') }}" class="btn-primary opacity-0 transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:animate-bounce"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        Go to My Notes
                    </a>

                    <a href="{{ route('profile.edit') }}" class="btn-secondary opacity-0 transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        View Profile
                    </a>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Create twinkling stars
                const starsContainer = document.getElementById('stars-container');
                for (let i = 0; i < 50; i++) {
                    const star = document.createElement('div');
                    star.className = 'absolute rounded-full bg-white';
                    star.style.width = `${Math.random() * 3 + 1}px`;
                    star.style.height = star.style.width;
                    star.style.left = `${Math.random() * 100}%`;
                    star.style.top = `${Math.random() * 100}%`;
                    star.style.opacity = Math.random() * 0.5;
                    starsContainer.appendChild(star);

                    // Animate stars to twinkle
                    anime({
                        targets: star,
                        opacity: [star.style.opacity, star.style.opacity * 0.5, star.style.opacity],
                        duration: Math.random() * 3000 + 2000,
                        direction: 'alternate',
                        loop: true,
                        easing: 'easeInOutSine'
                    });
                }

                // Dashboard card animation
                anime({
                    targets: '#dashboard-card',
                    translateY: [40, 0],
                    opacity: [0, 1],
                    duration: 1000,
                    easing: 'easeOutExpo'
                });

                // Title animation
                anime({
                    targets: '#dashboard-card h1',
                    translateY: [-30, 0],
                    opacity: [0, 1],
                    duration: 800,
                    delay: 200,
                    easing: 'easeOutElastic(1, .8)'
                });

                // Text animation
                anime({
                    targets: '#dashboard-card p',
                    translateY: [30, 0],
                    opacity: [0, 1],
                    duration: 800,
                    delay: 400,
                    easing: 'easeOutExpo'
                });

                // Buttons animation
                anime({
                    targets: '.btn-primary',
                    translateX: [-40, 0],
                    opacity: [0, 1],
                    duration: 800,
                    delay: 600,
                    easing: 'easeOutExpo'
                });

                anime({
                    targets: '.btn-secondary',
                    translateX: [40, 0],
                    opacity: [0, 1],
                    duration: 800,
                    delay: 700,
                    easing: 'easeOutExpo'
                });

                // Floating elements animation
                const floaters = document.querySelectorAll('.animate-float');
                floaters.forEach(floater => {
                    anime({
                        targets: floater,
                        translateY: () => anime.random(-30, 30),
                        translateX: () => anime.random(-30, 30),
                        duration: () => anime.random(8000, 12000),
                        direction: 'alternate',
                        loop: true,
                        easing: 'easeInOutSine'
                    });
                });

                // Button hover effects
                document.querySelectorAll('.btn-primary').forEach(btn => {
                    btn.addEventListener('mouseenter', () => {
                        anime({
                            targets: btn,
                            scale: 1.05,
                            duration: 300,
                            easing: 'easeOutExpo'
                        });
                    });
                    btn.addEventListener('mouseleave', () => {
                        anime({
                            targets: btn,
                            scale: 1,
                            duration: 500,
                            easing: 'easeOutElastic(1, .5)'
                        });
                    });
                });
            });
        </script>

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

            @keyframes pulse-glow {

                0%,
                100% {
                    box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.1);
                }

                50% {
                    box-shadow: 0 0 0 15px rgba(99, 102, 241, 0);
                }
            }

            @keyframes shooting-star {
                0% {
                    transform: translateX(0) translateY(0);
                    opacity: 1;
                }

                70% {
                    opacity: 1;
                }

                100% {
                    transform: translateX(1000px) translateY(300px);
                    opacity: 0;
                }
            }

            @keyframes bounce {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-8px);
                }
            }

            .animate-float {
                animation: float 8s infinite ease-in-out;
            }

            .animation-delay-2000 {
                animation-delay: 2s;
            }

            .animation-delay-4000 {
                animation-delay: 4s;
            }

            .animate-pulse-glow {
                animation: pulse-glow 3s infinite ease-in-out;
            }

            .shooting-star {
                position: absolute;
                width: 100px;
                height: 2px;
                background: linear-gradient(to right, transparent, white);
                border-radius: 50%;
                filter: drop-shadow(0 0 6px rgba(255, 255, 255, 0.7));
                animation: shooting-star 3s linear infinite;
                transform: rotate(-45deg);
                transform-origin: left center;
            }

            .animate-bounce {
                animation: bounce 1s infinite ease-in-out;
            }

            .btn-primary {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding-left: 1.5rem;
                padding-right: 1.5rem;
                padding-top: 0.75rem;
                padding-bottom: 0.75rem;
                background-image: linear-gradient(to right, #2563eb, #8b5cf6);
                color: #fff;
                border-radius: 0.75rem;
                box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.15), 0 4px 6px -4px rgba(139, 92, 246, 0.10);
                font-weight: 600;
                transition: all 0.3s;
                font-size: 1rem;
                border: none;
            }

            .btn-primary:hover {
                background-image: linear-gradient(to right, #1d4ed8, #7c3aed);
                box-shadow: 0 12px 24px 0 rgba(59, 130, 246, 0.18);
            }

            .btn-secondary {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding-left: 1.5rem;
                padding-right: 1.5rem;
                padding-top: 0.75rem;
                padding-bottom: 0.75rem;
                background-color: #fff;
                border: 1px solid #bfdbfe;
                color: #2563eb;
                border-radius: 0.75rem;
                box-shadow: 0 4px 8px 0 rgba(59, 130, 246, 0.08);
                font-weight: 600;
                transition: all 0.3s;
                font-size: 1rem;
            }

            .btn-secondary:hover {
                background-color: #eff6ff;
                color: #7c3aed;
                box-shadow: 0 8px 16px 0 rgba(59, 130, 246, 0.12);
            }
        </style>
    </div>
@endsection
