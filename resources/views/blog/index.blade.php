@extends('layouts.app')

@section('title', 'Home')

@section('content')
<h1>News & Blog</h1>
  @foreach ($posts as $post)
    <a href="/blog/{{ $post->slug }}">
      <h2>{{ $post->title }}</h2>
      <p>{{ Str::limit(strip_tags($post->excerpt), 150) }}</p>
    </a>
  @endforeach
@endsection
