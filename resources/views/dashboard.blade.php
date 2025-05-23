@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6 text-blue-700">Dashboard</h1>
    <div class="bg-white shadow rounded p-6">
        <p class="text-lg text-gray-700 mb-4">Welcome, {{ Auth::user()->name }}!</p>
        <a href="{{ route('notes.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold">Go to My Notes</a>
    </div>
</div>
@endsection
