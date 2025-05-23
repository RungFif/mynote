@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Note</h1>
    <form action="{{ route('notes.update', $note) }}" method="POST" class="bg-white shadow rounded p-6 space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block font-semibold mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title', $note->title) }}" class="w-full border rounded px-3 py-2" required>
            @error('title')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div>
            <label class="block font-semibold mb-1">Content</label>
            <textarea name="content" rows="5" class="w-full border rounded px-3 py-2" required>{{ old('content', $note->content) }}</textarea>
            @error('content')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="flex justify-end gap-2">
            <a href="{{ route('notes.index') }}" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection
