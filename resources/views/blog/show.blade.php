<h1>{{ $post->title }}</h1>
@if ($post->cover_image)
  <img src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }}">
@endif
<div>{!! $post->body !!}</div>
