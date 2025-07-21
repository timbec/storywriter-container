@extends('layouts.app')

@section('title', 'Storybook')

@section('content')
    <h1>Story Writer Page</h1>
    <form method="GET" action="{{ route('storybook.logout') }}">
    <button type="submit" class="text-sm text-red-600 underline">
        Log out
    </button>
</form>
    <iframe
        src="{{ config('app.storywriter_url') }}"
        style="width: 100%; height: 100vh; border: 0;"
        allow="clipboard-write"
    ></iframe>
@endsection
