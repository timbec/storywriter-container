@extends('layouts.app')

@section('title', 'News & Blog')

@section('content')
    <h1 class="text-3xl font-bold mb-6">News & Blog</h1>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
            <a href="/blog/{{ $post->slug }}" class="block group hover:bg-gray-50 rounded-lg transition overflow-hidden border border-gray-200">
                @if ($post->cover_image)
                    <div class="aspect-w-4 aspect-h-3">
                        <img 
                            src="{{ asset('storage/' . $post->cover_image) }}" 
                            alt="{{ $post->title }}" 
                            class="object-cover w-full h-full"
                        >
                    </div>
                @endif

                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-900 group-hover:text-amber-600 transition">
                        {{ $post->title }}
                    </h2>
                    <p class="text-gray-600 mt-2 text-sm">
                        {{ Str::limit(strip_tags($post->excerpt), 100) }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
