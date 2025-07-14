@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Animated Background Elements -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
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

        <!-- Floating Particles now cover the entire index content -->
        <div id="floating-particles" class="fixed inset-0 z-0 overflow-hidden pointer-events-none"></div>

        <div class="relative z-10">
            <!-- Header -->
            <div class="relative mb-12 text-center">
                <h1 id="notes-title"
                    class="text-5xl md:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 mb-4">
                    My Notes
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Capture your thoughts and ideas in a beautifully animated space
                </p>
            </div>

            <!-- Action Button with Floating Animation -->
            <div class="flex justify-center mb-12">
                <a href="{{ route('notes.create') }}" id="create-note-btn"
                    class="group relative inline-flex items-center justify-center px-8 py-4 overflow-hidden font-bold text-white rounded-2xl shadow-2xl transform transition-all duration-500 hover:scale-105">
                    <span
                        class="absolute inset-0 w-full h-full bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 group-hover:from-blue-600 group-hover:via-purple-600 group-hover:to-pink-600"></span>
                    <span
                        class="absolute top-0 left-0 w-full bg-gradient-to-b from-white to-transparent opacity-20 h-1/3"></span>
                    <span
                        class="absolute bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-white to-transparent opacity-20"></span>
                    <span
                        class="absolute bottom-0 left-0 w-4 h-full bg-white opacity-10 group-hover:w-6 transition-all duration-300 ease-out"></span>
                    <span
                        class="absolute right-0 bottom-0 w-4 h-full bg-white opacity-10 group-hover:w-6 transition-all duration-300 ease-out"></span>
                    <span class="absolute inset-0 w-full h-full border border-white rounded-2xl opacity-10"></span>
                    <span class="relative z-10 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>New Note</span>
                    </span>
                </a>
            </div>

            @if (session('success'))
                <div id="success-message"
                    class="mb-8 p-4 bg-gradient-to-r from-green-100 to-teal-100 border-l-4 border-green-500 text-green-800 rounded-lg shadow-lg transition-all duration-500 cursor-pointer group relative overflow-hidden">
                    <div class="flex items-center relative z-10">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                    <span
                        class="absolute left-0 top-0 h-full w-1 bg-gradient-to-b from-green-400 to-teal-400 group-hover:w-full transition-all duration-500 ease-out z-0 opacity-40"></span>
                </div>
            @endif

            <!-- Search and Filter Bar -->
            <form method="GET" action="{{ route('notes.index') }}" class="mb-10 flex flex-col md:flex-row items-center gap-4 justify-center relative z-20">
                <div class="relative w-full md:w-96">
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="w-full px-6 py-3 rounded-full border-2 border-blue-200 focus:border-blue-400 focus:ring-4 focus:ring-blue-100 bg-white/80 shadow-lg text-lg transition-all duration-300 placeholder-gray-400"
                        placeholder="Search notes (title, content, tags)...">
                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4-4m0 0A7 7 0 104 4a7 7 0 0013 13z" />
                        </svg>
                    </span>
                </div>
                <div class="relative w-full md:w-64">
                    <select name="tag" onchange="this.form.submit()"
                        class="w-full px-6 py-3 rounded-full border-2 border-pink-200 focus:border-pink-400 focus:ring-4 focus:ring-pink-100 bg-white/80 shadow-lg text-lg transition-all duration-300 text-pink-700">
                        <option value="">Filter by tag</option>
                        @php
                            $allTags = collect($notes)->flatMap(function($note) {
                                return array_map('trim', explode(',', $note->tags ?? ''));
                            })->filter()->unique()->sort();
                        @endphp
                        @foreach($allTags as $tag)
                            <option value="{{ $tag }}" @if(request('tag') == $tag) selected @endif>{{ $tag }}</option>
                        @endforeach
                    </select>
                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-pink-400 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </div>
                <button type="submit"
                    class="px-8 py-3 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-bold shadow-xl transition-all duration-300 relative overflow-hidden group">
                    <span class="relative z-10 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Search
                    </span>
                    <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity duration-300"></span>
                </button>
                @if(request('search') || request('tag'))
                    <a href="{{ route('notes.index') }}" class="ml-2 text-sm text-gray-400 hover:text-blue-500 underline transition-all">Clear</a>
                @endif
            </form>
            <!-- End Search and Filter Bar -->

            <!-- Notes Container with Floating Effect -->
            <div id="notes-container"
                class="relative bg-white bg-opacity-90 backdrop-filter backdrop-blur-sm rounded-3xl shadow-2xl divide-y divide-gray-100 overflow-hidden">
                @forelse($notes as $index => $note)
                    <div
                        class="note-card group relative p-6 flex justify-between items-center hover:bg-gradient-to-r from-blue-50 to-purple-50 transition-all duration-300">
                        <!-- Decorative Note Corner -->

                        <div class="flex-1 min-w-0">
                            <div class="font-bold text-xl text-gray-900 mb-1 truncate">{{ $note->title }}</div>
                            <div class="text-gray-600 text-sm line-clamp-2">{{ Str::limit($note->content, 120) }}</div>
                            <div class="mt-2 text-xs text-gray-400">
                                {{ $note->created_at->format('M d, Y') }}
                                @if($note->tags)
                                    <span class="ml-2 inline-block px-2 py-0.5 rounded bg-pink-100 text-pink-700 font-semibold text-xs animate-fade-in">
                                        {{ $note->tags }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex gap-4 ml-4">
                            <a href="{{ route('notes.show', $note) }}" class="show-btn transform transition-all duration-300 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500 hover:text-purple-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <a href="{{ route('notes.edit', $note) }}"
                                class="edit-btn transform transition-all duration-300 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 hover:text-blue-700"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('notes.destroy', $note) }}" method="POST"
                                onsubmit="return confirm('Delete this note?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="delete-btn transform transition-all duration-300 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 hover:text-red-700"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <!-- Hover Effect Border -->
                        <div
                            class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-400 to-purple-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                @empty
                    <div id="empty-state" class="p-12 text-center">
                        <div
                            class="mx-auto w-48 h-48 bg-gradient-to-br from-blue-50 to-purple-50 rounded-full flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-medium text-gray-700 mb-2">No notes yet</h3>
                        <p class="text-gray-500 mb-6">Start by creating your first note</p>
                    </div>
                @endforelse
            </div>

            <!-- Floating Action Button for Mobile -->
            <div class="fixed bottom-8 right-8 z-50 md:hidden">
                <a href="{{ route('notes.create') }}"
                    class="w-16 h-16 flex items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-purple-500 shadow-xl text-white transform transition hover:scale-110 hover:rotate-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </a>
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

            // Title animation with letters
            const title = document.getElementById('notes-title');
            if (title) {
                const text = title.textContent;
                title.textContent = '';

                text.split('').forEach((char, i) => {
                    const span = document.createElement('span');
                    span.textContent = char;
                    span.style.display = 'inline-block';
                    span.style.opacity = '0';
                    title.appendChild(span);

                    anime({
                        targets: span,
                        opacity: [0, 1],
                        translateY: [-20, 0],
                        duration: 800,
                        delay: 200 + i * 50,
                        easing: 'easeOutElastic(1, .8)'
                    });
                });
            }

            // Create note button animation
            const createBtn = document.getElementById('create-note-btn');
            if (createBtn) {
                createBtn.addEventListener('mouseenter', () => {
                    anime({
                        targets: createBtn,
                        scale: 1.05,
                        duration: 300,
                        easing: 'easeOutExpo'
                    });

                    // Ripple effect
                    const ripple = document.createElement('span');
                    ripple.className = 'absolute inset-0 rounded-2xl bg-white opacity-0';
                    createBtn.appendChild(ripple);

                    anime({
                        targets: ripple,
                        opacity: [0, 0.1],
                        scale: [0.5, 1.5],
                        duration: 800,
                        easing: 'easeOutExpo',
                        complete: () => ripple.remove()
                    });
                });

                createBtn.addEventListener('mouseleave', () => {
                    anime({
                        targets: createBtn,
                        scale: 1,
                        duration: 500,
                        easing: 'easeOutElastic(1, .5)'
                    });
                });
            }

            // Success message animation (no glass-effect)
            const successMsg = document.getElementById('success-message');
            if (successMsg) {
                anime({
                    targets: successMsg,
                    translateX: [-50, 0],
                    opacity: [0, 1],
                    scale: [0.9, 1],
                    duration: 1000,
                    easing: 'easeOutElastic(1, .8)'
                });
                successMsg.addEventListener('mouseenter', () => {
                    anime({
                        targets: successMsg,
                        scale: 1.04,
                        boxShadow: '0 8px 32px 0 rgba(34,197,94,0.25)',
                        duration: 400,
                        easing: 'easeOutBack'
                    });
                });
                successMsg.addEventListener('mouseleave', () => {
                    anime({
                        targets: successMsg,
                        scale: 1,
                        boxShadow: '0 4px 16px 0 rgba(34,197,94,0.15)',
                        duration: 600,
                        easing: 'easeOutElastic(1, .5)'
                    });
                });
            }

            // Note cards animation
            const noteCards = document.querySelectorAll('.note-card');
            noteCards.forEach((card, i) => {
                anime({
                    targets: card,
                    opacity: [0, 1],
                    translateY: [30, 0],
                    delay: 300 + i * 100,
                    duration: 800,
                    easing: 'easeOutExpo'
                });

                // Hover effects
                card.addEventListener('mouseenter', () => {
                    anime({
                        targets: card,
                        translateY: -5,
                        duration: 300,
                        easing: 'easeOutExpo'
                    });
                });

                card.addEventListener('mouseleave', () => {
                    anime({
                        targets: card,
                        translateY: 0,
                        duration: 500,
                        easing: 'easeOutElastic(1, .5)'
                    });
                });
            });

            // Empty state animation
            const emptyState = document.getElementById('empty-state');
            if (emptyState) {
                anime({
                    targets: emptyState,
                    opacity: [0, 1],
                    scale: [0.9, 1],
                    duration: 1000,
                    delay: 300,
                    easing: 'easeOutElastic(1, .8)'
                });
            }

            // Edit/Delete buttons animation
            const editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(btn => {
                btn.addEventListener('mouseenter', () => {
                    anime({
                        targets: btn,
                        rotate: '10deg',
                        duration: 300,
                        easing: 'easeOutBack'
                    });
                });

                btn.addEventListener('mouseleave', () => {
                    anime({
                        targets: btn,
                        rotate: '0deg',
                        duration: 500,
                        easing: 'easeOutElastic(1, .5)'
                    });
                });
            });

            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(btn => {
                btn.addEventListener('mouseenter', () => {
                    anime({
                        targets: btn,
                        rotate: '-10deg',
                        duration: 300,
                        easing: 'easeOutBack'
                    });
                });

                btn.addEventListener('mouseleave', () => {
                    anime({
                        targets: btn,
                        rotate: '0deg',
                        duration: 500,
                        easing: 'easeOutElastic(1, .5)'
                    });
                });
            });

            // Show buttons animation
            const showButtons = document.querySelectorAll('.show-btn');
            showButtons.forEach(btn => {
                btn.addEventListener('mouseenter', () => {
                    anime({
                        targets: btn,
                        scale: 1.15,
                        rotate: '8deg',
                        duration: 300,
                        easing: 'easeOutBack'
                    });
                });
                btn.addEventListener('mouseleave', () => {
                    anime({
                        targets: btn,
                        scale: 1,
                        rotate: '0deg',
                        duration: 500,
                        easing: 'easeOutElastic(1, .5)'
                    });
                });
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

            // Animate search/filter bar entrance
            anime({
                targets: 'form[action="{{ route('notes.index') }}"]',
                translateY: [-40, 0],
                opacity: [0, 1],
                duration: 1000,
                delay: 200,
                easing: 'easeOutElastic(1, .8)'
            });

            // Animate filter dropdown on focus
            const tagSelect = document.querySelector('select[name="tag"]');
            if (tagSelect) {
                tagSelect.addEventListener('focus', () => {
                    anime({
                        targets: tagSelect,
                        scale: 1.04,
                        boxShadow: '0 0 0 4px #f9a8d4',
                        duration: 400,
                        easing: 'easeOutBack'
                    });
                });
                tagSelect.addEventListener('blur', () => {
                    anime({
                        targets: tagSelect,
                        scale: 1,
                        boxShadow: '0 0 0 0px #f9a8d4',
                        duration: 600,
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

        .animate-blob {
            animation: blob 12s infinite ease-in-out;
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

        .note-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            will-change: transform;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection
