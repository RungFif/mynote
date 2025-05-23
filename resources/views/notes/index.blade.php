@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">My Notes</h1>
        <a href="{{ route('notes.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ New Note</a>
    </div>
    @if(session('success'))
        <div class="mb-4 p-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    <div class="bg-white shadow rounded divide-y">
        @forelse($notes as $note)
            <div class="p-4 flex justify-between items-center">
                <div>
                    <div class="font-semibold">{{ $note->title }}</div>
                    <div class="text-gray-600 text-sm">{{ Str::limit($note->content, 80) }}</div>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('notes.edit', $note) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('notes.destroy', $note) }}" method="POST" onsubmit="return confirm('Delete this note?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="p-4 text-gray-500">No notes yet.</div>
        @endforelse
    </div>
</div>
@endsection
