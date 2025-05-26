@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Floating Background Elements -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
            <div
                class="absolute top-1/4 left-1/4 w-64 h-64 bg-gradient-to-r from-blue-200/20 to-purple-200/20 rounded-full animate-blob animation-delay-2000 filter blur-3xl">
            </div>
            <div
                class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-gradient-to-br from-pink-200/20 to-yellow-200/20 rounded-full animate-blob animation-delay-4000 filter blur-3xl">
            </div>
        </div>

        <!-- Animated Title -->
        <h1 id="edit-title"
            class="text-4xl font-extrabold text-center mb-10 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">
            <span class="inline-block">Edit</span>
            <span class="inline-block">Your</span>
            <span class="inline-block">Masterpiece</span>
        </h1>

        <!-- Floating Form Container -->
        <div id="form-container"
            class="relative bg-white/90 backdrop-blur-lg rounded-3xl shadow-2xl overflow-hidden border border-white/30 transform transition-all duration-500 hover:shadow-3xl">
            <!-- Pulsing Border -->
            <div class="absolute inset-0 rounded-3xl border-2 border-transparent pointer-events-none animate-pulse-border">
            </div>

            <form action="{{ route('notes.update', $note) }}" method="POST" class="p-8 space-y-6">
                @csrf
                @method('PUT')

                <!-- Title Field with Floating Label -->
                <div class="relative group">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded-lg blur opacity-25 group-hover:opacity-75 transition duration-200">
                    </div>
                    <div class="relative bg-white rounded-lg">
                        <div class="floating-label">
                            <input type="text" name="title" id="title" value="{{ old('title', $note->title) }}"
                                class="w-full px-4 py-3 border-0 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-300 focus:bg-white transition-all duration-300 peer"
                                placeholder=" " required>
                            <label for="title"
                                class="absolute left-4 top-3 px-1 text-blue-600 transition-all duration-300 peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-3 peer-focus:text-xs peer-focus:text-blue-600 bg-white peer-placeholder-shown:bg-transparent text-xs">
                                Title
                            </label>
                        </div>
                        @error('title')
                            <div class="error-message mt-2 text-red-600 flex items-center">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Content Field with Growing Textarea -->
                <div class="relative group">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-pink-400 to-yellow-400 rounded-lg blur opacity-25 group-hover:opacity-75 transition duration-200">
                    </div>
                    <div class="relative bg-white rounded-lg">
                        <div class="floating-label">
                            <textarea name="content" id="content" rows="5"
                                class="w-full px-4 py-3 border-0 rounded-lg bg-gray-50 focus:ring-2 focus:ring-purple-300 focus:bg-white transition-all duration-300 resize-none peer auto-expand"
                                placeholder=" " required>{{ old('content', $note->content) }}</textarea>
                            <label for="content"
                                class="absolute left-4 top-3 px-1 text-purple-600 transition-all duration-300 peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-3 peer-focus:text-xs peer-focus:text-purple-600 bg-white peer-placeholder-shown:bg-transparent text-xs">
                                Content
                            </label>
                        </div>
                        @error('content')
                            <div class="error-message mt-2 text-red-600 flex items-center">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons with Crazy Hover Effects -->
                <div class="flex justify-end gap-4 pt-4">
                    <a href="{{ route('notes.index') }}"
                        class="cancel-btn relative px-6 py-3 rounded-xl bg-gray-100 text-gray-800 font-medium overflow-hidden group transition-all duration-300 hover:text-white">
                        <span class="relative z-10 flex items-center">
                            <svg class="w-5 h-5 mr-2 group-hover:animate-spin" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Cancel
                        </span>
                        <span
                            class="absolute inset-0 bg-gradient-to-r from-gray-400 to-gray-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    </a>
                    <button type="submit"
                        class="submit-btn relative px-6 py-3 rounded-xl bg-gradient-to-r from-blue-500 to-purple-500 text-white font-medium overflow-hidden group transition-all duration-300 hover:from-blue-600 hover:to-purple-600">
                        <span class="relative z-10 flex items-center">
                            <svg class="w-5 h-5 mr-2 group-hover:animate-bounce" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Update Note
                        </span>
                        <span
                            class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity duration-300"></span>
                        <span
                            class="absolute -right-4 -top-4 w-8 h-8 bg-white rounded-full opacity-0 group-hover:opacity-20 group-hover:right-20 group-hover:top-10 transition-all duration-700"></span>
                        <span
                            class="absolute -right-4 -bottom-4 w-8 h-8 bg-white rounded-full opacity-0 group-hover:opacity-20 group-hover:right-20 group-hover:bottom-10 transition-all duration-700 delay-100"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Title animation - letters flying in
            anime({
                targets: '#edit-title span',
                translateY: [-50, 0],
                opacity: [0, 1],
                duration: 1200,
                delay: anime.stagger(150),
                easing: 'easeOutElastic(1, .8)'
            });

            // Form container entrance
            anime({
                targets: '#form-container',
                scale: [0.95, 1],
                opacity: [0, 1],
                duration: 1000,
                easing: 'easeOutElastic(1, .8)',
                delay: 800
            });

            // Input fields animation
            anime({
                targets: '.floating-label input, .floating-label textarea',
                translateY: [20, 0],
                opacity: [0, 1],
                delay: anime.stagger(100, {
                    start: 1200
                }),
                duration: 800,
                easing: 'easeOutExpo'
            });

            // Labels animation
            anime({
                targets: '.floating-label label',
                translateX: [-20, 0],
                opacity: [0, 1],
                delay: anime.stagger(100, {
                    start: 1300
                }),
                duration: 800,
                easing: 'easeOutExpo'
            });

            // Buttons animation
            anime({
                targets: '.cancel-btn, .submit-btn',
                translateY: [30, 0],
                opacity: [0, 1],
                delay: anime.stagger(100, {
                    start: 1500
                }),
                duration: 800,
                easing: 'easeOutBack'
            });

            // Auto-expanding textarea
            document.querySelectorAll('.auto-expand').forEach(el => {
                el.addEventListener('input', function() {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight) + 'px';


                });
            });

            // Crazy hover effect for form container
            const formContainer = document.getElementById('form-container');
            if (formContainer) {
                formContainer.addEventListener('mousemove', (e) => {
                    const x = e.clientX / window.innerWidth;
                    const y = e.clientY / window.innerHeight;

                    anime({
                        targets: formContainer,
                        rotateX: (y * 10) - 5,
                        rotateY: (x * 10) - 5,
                        duration: 500,
                        easing: 'easeOutQuad'
                    });
                });

                formContainer.addEventListener('mouseleave', () => {
                    anime({
                        targets: formContainer,
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

        @keyframes pulse-border {

            0%,
            100% {
                border-color: rgba(99, 102, 241, 0);
            }

            50% {
                border-color: rgba(99, 102, 241, 0.3);
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

        .animate-pulse-border {
            animation: pulse-border 3s infinite ease-in-out;
        }

        .floating-label {
            position: relative;
            padding-top: 1rem;
        }

        .floating-label input,
        .floating-label textarea {
            transition: all 0.3s ease;
        }

        .floating-label label {
            position: absolute;
            pointer-events: none;
            z-index: 10;
        }

        .error-message {
            animation: shake 0.5s ease-in-out;
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
                transform: translateX(-5px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(5px);
            }
        }

        .auto-expand {
            min-height: 150px;
            transition: height 0.2s ease-out;
        }
    </style>
@endsection
