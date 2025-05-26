@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Astrological Background Elements -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
            <!-- Zodiac Constellation Patterns -->
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10">
            </div>

            <!-- Celestial Bodies -->
            <div
                class="absolute top-1/4 left-1/4 w-48 h-48 bg-gradient-to-r from-blue-200 to-purple-200 rounded-full opacity-10 animate-blob animation-delay-2000 filter blur-3xl">
            </div>
            <div
                class="absolute bottom-1/3 right-1/4 w-64 h-64 bg-gradient-to-br from-pink-200 to-yellow-200 rounded-full opacity-10 animate-blob animation-delay-4000 filter blur-3xl">
            </div>
            <div
                class="absolute top-1/3 right-1/3 w-32 h-32 bg-gradient-to-tr from-green-200 to-teal-200 rounded-full opacity-10 animate-blob animation-delay-6000 filter blur-3xl">
            </div>


            <!-- Twinkling Stars -->
            <div class="stars-container absolute inset-0"></div>
        </div>

        <div class="relative z-10">
            <!-- Note Card Container -->
            <div id="note-container"
                class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-2xl overflow-hidden border border-white/30 transform transition-all duration-500">
                <!-- Note Header -->
                <div class="relative p-8 border-b border-gray-100">
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

                <!-- Action Buttons - Improved Design -->
                <div
                    class="flex flex-col sm:flex-row justify-between gap-4 p-8 border-t border-gray-100 bg-gradient-to-r from-blue-50/30 to-purple-50/30">
                    <a href="{{ route('notes.index') }}" id="back-btn" class="btn-constellation opacity-0 transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:animate-spin-slow"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Back to Notes
                    </a>

                    <div class="flex gap-4 flex-wrap justify-center sm:justify-end">
                        <a href="{{ route('notes.edit', $note) }}" id="edit-btn" class="btn-stardust opacity-0 transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:animate-pulse"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2h2v2h2v-2h2v-2h-2v-2h-2v2H9v2z" />
                            </svg>
                            Edit Note
                        </a>

                        <form action="{{ route('notes.destroy', $note) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this note?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="delete-btn" class="btn-meteor opacity-0 transform">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:animate-shake"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

        <!-- Decorative Animated Background Behind Card - REMOVED AS PER REQUEST -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Create twinkling stars
                const starsContainer = document.querySelector('.stars-container');
                for (let i = 0; i < 30; i++) {
                    const star = document.createElement('div');
                    star.className = 'absolute rounded-full bg-blue-200 opacity-0 animate-twinkle';
                    star.style.width = `${Math.random() * 3 + 1}px`;
                    star.style.height = star.style.width;
                    star.style.left = `${Math.random() * 100}%`;
                    star.style.top = `${Math.random() * 100}%`;
                    star.style.animationDelay = `${Math.random() * 5}s`;
                    starsContainer.appendChild(star);
                }

                // Note container entrance
                anime({
                    targets: '#note-container',
                    scale: [0.98, 1],
                    opacity: [0, 1],
                    duration: 800,
                    easing: 'easeOutExpo'
                });

                // Title animation
                anime({
                    targets: '#note-title',
                    translateY: [-20, 0],
                    opacity: [0, 1],
                    duration: 800,
                    delay: 200,
                    easing: 'easeOutExpo'
                });

                // Dates animation
                anime({
                    targets: '#note-dates',
                    translateY: [15, 0],
                    opacity: [0, 1],
                    duration: 800,
                    delay: 400,
                    easing: 'easeOutExpo'
                });

                // Content animation
                anime({
                    targets: '#note-content',
                    translateY: [30, 0],
                    opacity: [0, 1],
                    duration: 1000,
                    delay: 600,
                    easing: 'easeOutExpo'
                });

                // Buttons animation
                anime({
                    targets: '#back-btn',
                    translateX: [-40, 0],
                    opacity: [0, 1],
                    duration: 800,
                    delay: 800,
                    easing: 'easeOutExpo'
                });

                anime({
                    targets: '#edit-btn',
                    translateY: [20, 0],
                    opacity: [0, 1],
                    duration: 800,
                    delay: 900,
                    easing: 'easeOutExpo'
                });

                anime({
                    targets: '#delete-btn',
                    translateY: [20, 0],
                    opacity: [0, 1],
                    duration: 800,
                    delay: 1000,
                    easing: 'easeOutExpo'
                });

                // Animate dots floating
                anime({
                    targets: '#animated-dots .dot',
                    translateY: [0, 20],
                    direction: 'alternate',
                    loop: true,
                    delay: anime.stagger(200, {start: 0}),
                    duration: 3000,
                    easing: 'easeInOutSine'
                });

                // Button hover effects
                document.querySelectorAll('.btn-constellation, .btn-stardust, .btn-meteor').forEach(btn => {
                    btn.addEventListener('mouseenter', () => {
                        anime({
                            targets: btn,
                            scale: 1.03,
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
                    transform: translateY(0) translateX(0);
                }

                50% {
                    transform: translateY(-20px) translateX(10px);
                }
            }

            @keyframes pulse {

                0%,
                100% {
                    opacity: 0.2;
                }

                50% {
                    opacity: 0.4;
                }
            }

            @keyframes twinkle {

                0%,
                100% {
                    opacity: 0;
                }

                50% {
                    opacity: 0.8;
                }
            }

            @keyframes spin-slow {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(-360deg);
                }
            }

            @keyframes shake {

                0%,
                100% {
                    transform: translateX(0);
                }

                10%,
                30%,
                50%,
                70%,
                90% {
                    transform: translateX(-3px);
                }

                20%,
                40%,
                60%,
                80% {
                    transform: translateX(3px);
                }
            }

            . .animate-float {
                animation: float 8s infinite ease-in-out;
            }

            .animate-pulse {
                animation: pulse 2s infinite ease-in-out;
            }

            .animate-twinkle {
                animation: twinkle 5s infinite ease-in-out;
            }

            .animate-spin-slow {
                animation: spin-slow 18s linear infinite;
            }

            .animate-shake {
                animation: shake 0.5s infinite;
            }

            /* Stardust Button */
            .btn-stardust {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.75rem 1.5rem;
                background-image: linear-gradient(120deg, #3b82f6 0%, #8b5cf6 50%, #f472b6 100%);
                color: #fff;
                border-radius: 0.75rem;
                box-shadow: 0 4px 24px 0 rgba(59, 130, 246, 0.25), 0 2px 8px 0 rgba(139, 92, 246, 0.15);
                font-weight: 500;
                transition: all 0.3s, box-shadow 0.5s;
                position: relative;
                overflow: hidden;
                z-index: 1;
            }

            .btn-stardust:hover {
                box-shadow: 0 12px 32px 0 rgba(59, 130, 246, 0.35), 0 4px 16px 0 rgba(244, 114, 182, 0.18);
            }

            .btn-stardust::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: radial-gradient(circle at 60% 40%, rgba(255,255,255,0.35) 0%, rgba(139,92,246,0.15) 60%, transparent 100%);
                opacity: 0.7;
                pointer-events: none;
                z-index: 0;
                transition: opacity 0.5s;
            }

            .btn-stardust:hover::before {
                opacity: 1;
            }

            /* Meteor Button */
            .btn-meteor {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.75rem 1.5rem;
                background-image: linear-gradient(to right, #ef4444, #ec4899);
                color: #fff;
                border-radius: 0.75rem;
                box-shadow: 0 4px 14px 0 rgba(239, 68, 68, 0.15);
                font-weight: 500;
                transition: all 0.3s;
                position: relative;
                overflow: hidden;
            }

            .btn-meteor:hover {
                box-shadow: 0 8px 24px 0 rgba(239, 68, 68, 0.25);
            }

            .btn-meteor::after {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 20%;
                height: 200%;
                background: linear-gradient(to bottom, transparent, rgba(255, 255, 255, 0.7), transparent);
                transform: rotate(30deg);
                transition: all 0.5s;
            }

            .btn-meteor:hover::after {
                left: 120%;
            }

            /* Constellation Button */
            .btn-constellation {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.75rem 1.5rem;
                background-color: #fff;
                border: 1px solid #bfdbfe;
                color: #3b82f6;
                border-radius: 0.75rem;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
                transition: all .3s;
                font-weight: 500;
                background-image: radial-gradient(circle, rgba(59, 130, 246, 0.1) 1px, transparent 1px);
                background-size: 10px 10px;
            }

            .prose {
                @apply max-w-none;
                line-height: 1.7;
            }

            .prose p {
                @apply mb-4;
            }
        </style>
    @endsection
