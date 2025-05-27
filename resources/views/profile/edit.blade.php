@extends('layouts.app')

@section('content')
    <div class="relative min-h-[60vh] max-w-2xl mx-auto py-12 px-4 md:px-0">
        <!-- Decorative Background -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
            <div
                class="absolute top-1/4 left-1/4 w-48 h-48 bg-gradient-to-r from-blue-100 to-purple-100 rounded-full opacity-10 animate-float animation-delay-2000 filter blur-3xl">
            </div>
            <div
                class="absolute bottom-1/3 right-1/4 w-64 h-64 bg-gradient-to-br from-pink-100 to-yellow-100 rounded-full opacity-10 animate-float animation-delay-4000 filter blur-3xl">
            </div>
        </div>

        <div class="relative z-10 bg-white shadow-2xl rounded-3xl p-8 border border-gray-100 backdrop-blur-sm">
            <div class="flex flex-col items-center">
                <div class="mb-6">
                    <div
                        class="w-24 h-24 rounded-full bg-gradient-to-br from-blue-400 to-purple-400 flex items-center justify-center shadow-lg">
                        <span class="text-4xl font-bold text-white">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    </div>
                </div>
                <h2
                    class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 mb-2">
                    {{ Auth::user()->name }}
                </h2>
                <p class="text-gray-600 mb-4">
                    <i class="fas fa-envelope mr-2 text-blue-400"></i>{{ Auth::user()->email }}
                </p>
                <p class="text-gray-400 text-sm mb-8">
                    Member since {{ Auth::user()->created_at->format('F Y') }}
                </p>
                <a href="{{ route('profile.edit') }}" class="btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Edit Profile
                </a>
            </div>
        </div>
        <style>
            .animate-float {
                animation: float 8s infinite ease-in-out;
            }

            .animation-delay-2000 {
                animation-delay: 2s;
            }

            .animation-delay-4000 {
                animation-delay: 4s;
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-20px);
                }
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
        </style>
    </div>
@endsection
