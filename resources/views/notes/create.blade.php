@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen max-w-2xl mx-auto py-12 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
            <!-- Floating Particles -->
            <div id="particles-js" class="absolute inset-0"></div>

            <!-- Animated Blobs -->
            <div
                class="absolute top-1/4 left-1/4 w-48 h-48 bg-gradient-to-r from-blue-200 to-purple-200 rounded-full opacity-10 animate-blob animation-delay-2000 filter blur-3xl">
            </div>
            <div
                class="absolute bottom-1/3 right-1/4 w-64 h-64 bg-gradient-to-br from-pink-200 to-yellow-200 rounded-full opacity-10 animate-blob animation-delay-4000 filter blur-3xl">
            </div>
            <div
                class="absolute top-1/3 right-1/3 w-32 h-32 bg-gradient-to-tr from-green-200 to-teal-200 rounded-full opacity-10 animate-blob animation-delay-6000 filter blur-3xl">
            </div>

            <!-- Floating Stars -->
            <div class="stars-container absolute inset-0"></div>
        </div>

        <div class="relative z-10">
            <!-- Animated Title Section -->
            <div class="text-center mb-12">
                <h1 id="create-title"
                    class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-500 to-pink-500 mb-3">
                    <span class="title-word">Create</span>
                    <span class="title-word">Your</span>
                    <span class="title-word">Masterpiece</span>
                </h1>
                <p id="subtitle" class="text-lg text-gray-600 max-w-xl mx-auto opacity-0">
                    <span class="inline-block">Where ideas come to life with</span>
                    <span
                        class="inline-block text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-500 font-semibold">magical
                        animations</span>
                </p>
            </div>

            <!-- Animated Form Container -->
            <form id="create-note-form" action="{{ route('notes.store') }}" method="POST"
                class="bg-white/90 shadow-2xl rounded-3xl p-8 space-y-6 backdrop-blur-md border border-white/30 relative overflow-hidden">

            

                <!-- Pulsing Glow Effect -->
                <div
                    class="absolute inset-0 rounded-3xl border-2 border-transparent animate-pulse-glow pointer-events-none">
                </div>

                @csrf
                <div class="form-group">
                    <label class="block font-semibold mb-2 text-blue-700 opacity-0">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full border-2 border-blue-100 rounded-xl px-5 py-3 focus:border-blue-400 focus:ring-4 focus:ring-blue-100 transition-all duration-300 text-lg shadow-inner opacity-0 transform"
                        required>
                    @error('title')
                        <div class="error-message text-red-600 text-sm mt-2 flex items-center opacity-0">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="block font-semibold mb-2 text-purple-700 opacity-0">Content</label>
                    <textarea name="content" rows="6"
                        class="w-full border-2 border-purple-100 rounded-xl px-5 py-3 focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition-all duration-300 text-lg shadow-inner resize-none auto-expand opacity-0 transform"
                        required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="error-message text-red-600 text-sm mt-2 flex items-center opacity-0">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Action Buttons with Crazy Effects -->
                <div class="flex justify-end gap-4 mt-8">
                    <a href="{{ route('notes.index') }}" id="cancel-btn"
                        class="cancel-btn px-6 py-3 rounded-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold shadow-md transition-all duration-300 relative overflow-hidden group opacity-0 transform">
                        <span class="relative z-10 flex items-center">
                            <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 mr-2 group-hover:animate-spin-fast'
                                fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2'
                                    d='M10 19l-7-7m0 0l7-7m-7 7h18' />
                            </svg>
                            Cancel
                        </span>
                        <span
                            class="absolute inset-0 bg-gradient-to-r from-gray-400 to-gray-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    </a>

                    <button type="submit" id="save-btn"
                        class="save-btn px-8 py-3 rounded-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold shadow-xl transition-all duration-300 relative overflow-hidden group opacity-0 transform">
                        <span class="relative z-10 flex items-center">
                            <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 mr-2 group-hover:animate-bounce'
                                fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7' />
                            </svg>
                            Save Note
                        </span>
                        <span
                            class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity duration-300"></span>
                        <span
                            class="absolute -right-4 -top-4 w-8 h-8 bg-white rounded-full opacity-0 group-hover:opacity-20 group-hover:right-20 group-hover:top-10 transition-all duration-700"></span>
                        <span
                            class="absolute -right-4 -bottom-4 w-8 h-8 bg-white rounded-full opacity-0 group-hover:opacity-20 group-hover:right-20 group-hover:bottom-10 transition-all duration-700 delay-100"></span>
                        <span class="confetti absolute inset-0 overflow-hidden pointer-events-none"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize particle.js background
            if (document.getElementById('particles-js')) {
                particlesJS('particles-js', {
                    particles: {
                        number: {
                            value: 60,
                            density: {
                                enable: true,
                                value_area: 800
                            }
                        },
                        color: {
                            value: "#6366f1"
                        },
                        shape: {
                            type: "circle"
                        },
                        opacity: {
                            value: 0.3,
                            random: true
                        },
                        size: {
                            value: 3,
                            random: true
                        },
                        line_linked: {
                            enable: true,
                            distance: 150,
                            color: "#818cf8",
                            opacity: 0.2,
                            width: 1
                        },
                        move: {
                            enable: true,
                            speed: 2,
                            direction: "none",
                            random: true,
                            straight: false,
                            out_mode: "out"
                        }
                    },
                    interactivity: {
                        detect_on: "canvas",
                        events: {
                            onhover: {
                                enable: true,
                                mode: "repulse"
                            },
                            onclick: {
                                enable: true,
                                mode: "push"
                            }
                        }
                    }
                });
            }

            // Create floating stars
            const starsContainer = document.querySelector('.stars-container');
            for (let i = 0; i < 20; i++) {
                const star = document.createElement('div');
                star.className = 'absolute rounded-full bg-white opacity-20';
                star.style.width = `${Math.random() * 4 + 2}px`;
                star.style.height = star.style.width;
                star.style.left = `${Math.random() * 100}%`;
                star.style.top = `${Math.random() * 100}%`;
                starsContainer.appendChild(star);

                anime({
                    targets: star,
                    translateX: () => anime.random(-50, 50),
                    translateY: () => anime.random(-50, 50),
                    opacity: () => anime.random(10, 30) / 100,
                    duration: () => anime.random(5000, 15000),
                    direction: 'alternate',
                    loop: true,
                    easing: 'easeInOutSine'
                });
            }

            // Title animation - letters flying in with color wave
            anime({
                targets: '.title-word',
                translateY: [-60, 0],
                opacity: [0, 1],
                color: () => {
                    const colors = ['#3b82f6', '#8b5cf6', '#ec4899', '#f59e0b'];
                    return colors[Math.floor(Math.random() * colors.length)];
                },
                duration: 1200,
                delay: anime.stagger(200),
                easing: 'easeOutElastic(1, .8)',
                complete: function() {
                    anime({
                        targets: '.title-word',
                        color: '#000',
                        duration: 1000,
                        easing: 'easeOutExpo'
                    });
                }
            });

            // Subtitle animation
            anime({
                targets: '#subtitle',
                opacity: [0, 1],
                translateY: [20, 0],
                duration: 1000,
                delay: 1000,
                easing: 'easeOutExpo'
            });

            // Form container entrance with 3D tilt
            anime({
                targets: '#create-note-form',
                scale: [0.95, 1],
                opacity: [0, 1],
                rotateX: [15, 0],
                rotateY: [-10, 0],
                duration: 1200,
                delay: 800,
                easing: 'easeOutElastic(1, .8)'
            });

            // Form elements animation
            anime({
                targets: '.form-group label',
                translateX: [-30, 0],
                opacity: [0, 1],
                delay: anime.stagger(100, {
                    start: 1200
                }),
                duration: 800,
                easing: 'easeOutExpo'
            });

            anime({
                targets: '.form-group input, .form-group textarea',
                translateY: [30, 0],
                opacity: [0, 1],
                delay: anime.stagger(100, {
                    start: 1400
                }),
                duration: 800,
                easing: 'easeOutBack'
            });

            // Error messages animation
            anime({
                targets: '.error-message',
                translateX: [-20, 0],
                opacity: [0, 1],
                delay: anime.stagger(100, {
                    start: 1600
                }),
                duration: 800,
                easing: 'easeOutElastic(1, .8)'
            });

            // Buttons animation
            anime({
                targets: '#cancel-btn',
                translateX: [-50, 0],
                opacity: [0, 1],
                duration: 1000,
                delay: 1800,
                easing: 'easeOutElastic(1, .8)'
            });

            anime({
                targets: '#save-btn',
                translateX: [50, 0],
                opacity: [0, 1],
                duration: 1000,
                delay: 1800,
                easing: 'easeOutElastic(1, .8)'
            });

            // Background blobs animation
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

            // Auto-expanding textarea
            document.querySelectorAll('.auto-expand').forEach(el => {
                el.addEventListener('input', function() {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight) + 'px';

                    // Add a little bounce effect when typing
                    anime({
                        targets: this,
                        scale: [1, 1.02, 1],
                        duration: 300,
                        easing: 'easeOutQuad'
                    });
                });
            });

            // Crazy save button effects
            const saveBtn = document.getElementById('save-btn');
            if (saveBtn) {
                saveBtn.addEventListener('mouseenter', function() {
                    // Create confetti particles
                    for (let i = 0; i < 20; i++) {
                        const confetti = document.createElement('div');
                        confetti.className = 'absolute rounded-full';
                        confetti.style.width = `${Math.random() * 10 + 5}px`;
                        confetti.style.height = confetti.style.width;
                        confetti.style.left = `${Math.random() * 100}%`;
                        confetti.style.top = `${Math.random() * 100}%`;
                        confetti.style.backgroundColor = `hsl(${Math.random() * 360}, 100%, 70%)`;
                        saveBtn.querySelector('.confetti').appendChild(confetti);

                        anime({
                            targets: confetti,
                            translateY: [0, -100],
                            translateX: () => anime.random(-50, 50),
                            opacity: [1, 0],
                            scale: [1, 0.5],
                            duration: 1000,
                            easing: 'easeOutExpo',
                            complete: () => confetti.remove()
                        });
                    }
                });
            }

            // Form hover effect
            const form = document.getElementById('create-note-form');
            if (form) {
                form.addEventListener('mousemove', (e) => {
                    const x = e.clientX / window.innerWidth;
                    const y = e.clientY / window.innerHeight;

                    anime({
                        targets: form,
                        rotateX: (y * 10) - 5,
                        rotateY: (x * 10) - 5,
                        duration: 500,
                        easing: 'easeOutQuad'
                    });
                });

                form.addEventListener('mouseleave', () => {
                    anime({
                        targets: form,
                        rotateX: 0,
                        rotateY: 0,
                        duration: 1000,
                        easing: 'easeOutElastic(1, .5)'
                    });
                });
            }
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

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.1);
            }

            50% {
                box-shadow: 0 0 0 20px rgba(99, 102, 241, 0);
            }
        }

        @keyframes spin-fast {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
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

        .animate-pulse-glow {
            animation: pulse-glow 3s infinite ease-in-out;
        }

        .animate-spin-fast {
            animation: spin-fast 0.5s linear infinite;
        }

        .auto-expand {
            min-height: 150px;
            transition: height 0.2s ease-out;
        }

        .confetti {
            pointer-events: none;
        }

        /* Custom scrollbar for textarea */
        textarea::-webkit-scrollbar {
            width: 8px;
        }

        textarea::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
            border-radius: 4px;
        }

        textarea::-webkit-scrollbar-thumb {
            background: rgba(99, 102, 241, 0.4);
            border-radius: 4px;
        }

        textarea::-webkit-scrollbar-thumb:hover {
            background: rgba(99, 102, 241, 0.6);
        }
    </style>
@endsection
