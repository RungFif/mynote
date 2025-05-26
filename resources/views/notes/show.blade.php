@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
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

        <!-- Floating Particles -->
        <div id="floating-particles" class="fixed inset-0 z-0 overflow-hidden pointer-events-none"></div>

        <div class="relative z-10">
            <!-- Note Card Container -->
            <div id="note-container"
                class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-2xl overflow-hidden border border-white/30 transform transition-all duration-500 hover:shadow-3xl">
                <!-- Decorative Corner Elements -->
                <div
                    class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-100 to-purple-100 opacity-20 rounded-bl-3xl">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-br from-pink-100 to-yellow-100 opacity-20 rounded-tr-3xl">
                </div>

                <!-- Pulsing Glow Effect -->
                <div
                    class="absolute inset-0 rounded-3xl border-2 border-transparent animate-pulse-glow pointer-events-none">
                </div>

                <!-- Note Header -->
                <div class="relative p-8 border-b border-gray-100">
                    <div class="absolute -top-8 left-1/2 transform -translate-x-1/2">
                        <div
                            class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-full p-2 shadow-lg animate-bounce animation-delay-1000">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                    </div>

                    <h2 id="note-title"
                        class="text-3xl md:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 text-center mb-4 mt-4 opacity-0 transform">
                        {{ $note->title }}
                    </h2>

                    <div id="note-dates" class="text-gray-500 text-sm text-center mb-6 opacity-0 transform">
                        Created: {{ $note->created_at->format('M d, Y H:i') }}
                        <span class="mx-2">|</span>
                        Last updated: {{ $note->updated_at->format('M d, Y H:i') }}
                    </div>
                </div>

                <!-- Note Content -->
                <div id="note-content" class="prose prose-lg max-w-none p-8 text-gray-800 opacity-0 transform">
                    {!! nl2br(e($note->content)) !!}
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row justify-between gap-4 p-8 border-t border-gray-100">
                    <a href="{{ route('notes.index') }}" id="back-btn" class="btn-secondary opacity-0 transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Back to Notes
                    </a>

                    <div class="flex gap-4">
                        <a href="{{ route('notes.edit', $note) }}" id="edit-btn" class="btn-primary opacity-0 transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2h2v2h2v-2h2v-2h-2v-2h-2v2H9v2z" />
                            </svg>
                            Edit Note
                        </a>

                        <form action="{{ route('notes.destroy', $note) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this note?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="delete-btn" class="btn-danger opacity-0 transform">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create floating particles
            const particlesContainer = document.getElementById('floating-particles');
            if (particlesContainer) {
                for (let i = 0; i < 20; i++) {
                    const particle = document.createElement('div');
                    particle.className =
                        'absolute rounded-full bg-gradient-to-r from-blue-300 to-purple-300 opacity-20';
                    particle.style.width = `${Math.random() * 10 + 5}px`;
                    particle.style.height = particle.style.width;
                    particle.style.left = `${Math.random() * 100}%`;
                    particle.style.top = `${Math.random() * 100}%`;
                    particlesContainer.appendChild(particle);

                    anime({
                        targets: particle,
                        translateX: () => anime.random(-30, 30),
                        translateY: () => anime.random(-30, 30),
                        duration: () => anime.random(10000, 20000),
                        direction: 'alternate',
                        loop: true,
                        easing: 'easeInOutSine'
                    });
                }
            }

            // Note container entrance
            anime({
                targets: '#note-container',
                scale: [0.95, 1],
                opacity: [0, 1],
                rotateX: [15, 0],
                rotateY: [-10, 0],
                duration: 1200,
                easing: 'easeOutElastic(1, .8)'
            });

            // Title animation
            anime({
                targets: '#note-title',
                translateY: [-30, 0],
                opacity: [0, 1],
                duration: 800,
                delay: 300,
                easing: 'easeOutExpo'
            });

            // Dates animation
            anime({
                targets: '#note-dates',
                translateY: [20, 0],
                opacity: [0, 1],
                duration: 800,
                delay: 500,
                easing: 'easeOutExpo'
            });

            // Content animation
            anime({
                targets: '#note-content',
                translateY: [40, 0],
                opacity: [0, 1],
                duration: 1000,
                delay: 700,
                easing: 'easeOutExpo'
            });

            // Buttons animation
            anime({
                targets: '#back-btn',
                translateX: [-50, 0],
                opacity: [0, 1],
                duration: 800,
                delay: 900,
                easing: 'easeOutExpo'
            });

            anime({
                targets: '#edit-btn',
                translateY: [30, 0],
                opacity: [0, 1],
                duration: 800,
                delay: 1000,
                easing: 'easeOutExpo'
            });

            anime({
                targets: '#delete-btn',
                translateY: [30, 0],
                opacity: [0, 1],
                duration: 800,
                delay: 1100,
                easing: 'easeOutExpo'
            });

            // Background blobs animation
            const blobs = document.querySelectorAll('.animate-blob');
            blobs.forEach(blob => {
                anime({
                    targets: blob,
                    translateX: () => anime.random(-100, 100),
                    translateY: () => anime.random(-100, 100),
                    scale: [1, 1.2],
                    duration: () => anime.random(8000, 12000),
                    direction: 'alternate',
                    loop: true,
                    easing: 'easeInOutSine'
                });
            });

            // Button hover effects
            document.querySelectorAll('.btn-primary').forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    anime({
                        targets: btn,
                        scale: 1.05,
                        duration: 300,
                        easing: 'easeOutExpo'
                    });
                });

                btn.addEventListener('mouseleave', function() {
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

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
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

        .animate-bounce {
            animation: bounce 2s infinite ease-in-out;
        }

        .btn-primary {
            @apply inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl shadow-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 font-semibold;
        }

        .btn-secondary {
            @apply inline-flex items-center justify-center px-6 py-3 bg-white border border-blue-200 text-blue-700 rounded-xl shadow hover:bg-blue-50 transition-all duration-300 font-semibold;
        }

        .btn-danger {
            @apply inline-flex items-center justify-center px-6 py-3 bg-red-500 text-white rounded-xl shadow hover:bg-red-600 transition-all duration-300 font-semibold;
        }

        .prose {
            @apply max-w-none;
            line-height: 1.6;
        }

        .prose p {
            @apply mb-4;
        }

        .prose a {
            @apply text-blue-600 hover:text-blue-800;
        }
    </style>
@endsection
