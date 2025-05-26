@extends('layouts.app')

@section('content')
    <div class="relative min-h-[60vh] max-w-2xl mx-auto py-12 px-4 md:px-0">
        <!-- Star Background Elements -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
            <div id="stars-container" class="absolute inset-0"></div>
            <div
                class="absolute top-1/4 left-1/4 w-48 h-48 bg-gradient-to-r from-blue-200 to-purple-200 rounded-full opacity-10 animate-blob animation-delay-2000 filter blur-3xl">
            </div>
            <div
                class="absolute bottom-1/3 right-1/4 w-64 h-64 bg-gradient-to-br from-pink-200 to-yellow-200 rounded-full opacity-10 animate-blob animation-delay-4000 filter blur-3xl">
            </div>
        </div>

        <div class="relative z-10">
            <div id="dashboard-card"
                class="bg-gradient-to-br from-white via-blue-50 to-purple-100 shadow-xl rounded-3xl p-8 border border-blue-100/50 backdrop-blur-sm">
                <h1 class="text-4xl font-extrabold text-blue-700 mb-6 tracking-tight opacity-0 transform">Welcome Back!</h1>

                <p class="text-lg text-gray-700 mb-6 opacity-0 transform">Hello, <span
                        class="font-semibold text-purple-700">{{ Auth::user()->name }}</span> 👋</p>

                <a href="{{ route('notes.index') }}"
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-full shadow-lg hover:from-blue-700 hover:to-purple-700 transition-all transform hover:scale-105 font-bold text-lg opacity-0 group relative overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    Go to My Notes
                    <!-- Star burst effect on hover -->
                    <span class="absolute inset-0 overflow-hidden pointer-events-none">
                        <span class="star-burst absolute hidden group-hover:block"></span>
                    </span>
                </a>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Create stars
                const starsContainer = document.getElementById('stars-container');
                for (let i = 0; i < 30; i++) {
                    const star = document.createElement('div');
                    star.className = 'absolute rounded-full bg-white';
                    star.style.width = `${Math.random() * 4 + 2}px`;
                    star.style.height = star.style.width;
                    star.style.left = `${Math.random() * 100}%`;
                    star.style.top = `${Math.random() * 100}%`;
                    star.style.opacity = Math.random() * 0.3 + 0.1;
                    starsContainer.appendChild(star);

                    // Animate stars
                    anime({
                        targets: star,
                        translateX: () => anime.random(-50, 50),
                        translateY: () => anime.random(-50, 50),
                        opacity: () => [star.style.opacity, anime.random(5, 30) / 100],
                        duration: () => anime.random(5000, 15000),
                        direction: 'alternate',
                        loop: true,
                        easing: 'easeInOutSine'
                    });
                }

                // Dashboard card animation
                anime({
                    targets: '#dashboard-card',
                    translateY: [30, 0],
                    opacity: [0, 1],
                    duration: 1000,
                    easing: 'easeOutExpo'
                });

                // Title animation
                anime({
                    targets: '#dashboard-card h1',
                    translateX: [-20, 0],
                    opacity: [0, 1],
                    duration: 800,
                    delay: 200,
                    easing: 'easeOutCubic'
                });

                // Text animation
                anime({
                    targets: '#dashboard-card p',
                    translateX: [20, 0],
                    opacity: [0, 1],
                    duration: 800,
                    delay: 400,
                    easing: 'easeOutCubic'
                });

                // Button animation with star burst
                anime({
                    targets: '#dashboard-card a',
                    scale: [0.8, 1],
                    opacity: [0, 1],
                    duration: 800,
                    delay: 600,
                    easing: 'easeOutBack',
                    complete: function() {
                        // Create star burst elements when button animation completes
                        const button = document.querySelector('#dashboard-card a');
                        const starBurst = button.querySelector('.star-burst');

                        for (let i = 0; i < 8; i++) {
                            const ray = document.createElement('div');
                            ray.className = 'absolute bg-white rounded-full';
                            ray.style.width = '4px';
                            ray.style.height = '15px';
                            ray.style.left = '50%';
                            ray.style.top = '50%';
                            ray.style.transformOrigin = 'center 30px';
                            ray.style.transform = `translate(-50%, -50%) rotate(${i * 45}deg)`;
                            ray.style.opacity = '0';
                            starBurst.appendChild(ray);
                        }

                        // Animate star burst on hover
                        button.addEventListener('mouseenter', function() {
                            anime({
                                targets: starBurst.children,
                                translateY: [0, -20],
                                opacity: [0, 0.8, 0],
                                scale: [1, 1.5],
                                duration: 1000,
                                delay: anime.stagger(100),
                                easing: 'easeOutExpo'
                            });
                        });
                    }
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

            .star-burst {
                width: 60px;
                height: 60px;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                pointer-events: none;
            }
        </style>
    </div>
@endsection
