@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">
            Welcome to Storywriter
        </h1>
        <p class="text-xl text-gray-600 mb-8">
            Create and manage your stories with ease
        </p>
        <a href="{{ route('storybook.login') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg">
            Get Started
        </a>
    </div>
</div>
@endsection