@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <div class="max-w-3xl mx-auto prose">
        {!! $page->body !!}
    </div>
@endsection
