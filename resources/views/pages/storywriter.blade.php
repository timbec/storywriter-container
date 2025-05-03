@extends('layouts.app')

@section('title', 'Storybook')

@section('content')
    <h1>Story Writer Page</h1>
    <iframe
        src="{{ config('app.storywriter_url') }}/storywriter"
        style="width: 100%; height: 100vh; border: 0;"
        allow="clipboard-write"
    ></iframe>
@endsection
