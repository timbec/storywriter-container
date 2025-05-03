@extends('layouts.app')

@section('title', 'Stories')

@section('content')
    <h1 class="text-2xl font-bold mb-6">All Stories</h1>

    @if ($stories->isEmpty())
        <p>No stories have been added yet.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($stories as $story)
                <div class="border rounded p-4 shadow bg-white">
                    @if ($story->image_url)
                        <img src="{{ $story->image_url }}" alt="Story image" class="w-full h-48 object-cover rounded mb-4">
                    @endif
                    <h2 class="text-xl font-semibold mb-2">{{ $story->title }}</h2>
                    <p class="text-gray-700 whitespace-pre-line">{{ Str::limit($story->content, 500) }}</p>
                </div>
            @endforeach
        </div>
    @endif
@endsection
