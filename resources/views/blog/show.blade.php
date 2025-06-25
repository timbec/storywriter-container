@extends('layouts.app')

@section('title', $post->title)

@section('content')
    @if ($post->cover_image)
        <div class="w-full mb-8">
            <img 
                src="{{ asset('storage/' . $post->cover_image) }}" 
                alt="{{ $post->title }}" 
                class="w-full h-96 object-cover rounded-md"
            >
        </div>
    @endif

    <div class="max-w-3xl mx-auto">
        <h1 class="text-4xl font-bold mb-6 text-center">{{ $post->title }}</h1>

        <div class="prose prose-lg max-w-none">
            {!! $post->body !!}
        </div>
    </div>
@endsection
