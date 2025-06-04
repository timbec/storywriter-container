<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="text-xl font-bold text-gray-900">
                            {{ config('app.name') }}
                        </a>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900">Home</a>
                        <a href="{{ route('blog') }}" class="text-gray-700 hover:text-gray-900">Blog</a>
                        <a href="{{ route('about') }}" class="text-gray-700 hover:text-gray-900">About</a>
                        <a href="{{ route('contact') }}" class="text-gray-700 hover:text-gray-900">Contact</a>
                        @auth('storybook')
                            <a href="{{ route('storybook') }}" class="text-blue-600 hover:text-blue-800">Storybook</a>
                            <a href="{{ route('storybook.logout') }}" class="text-gray-700 hover:text-gray-900">Logout</a>
                        @else
                            <a href="{{ route('storybook.login') }}" class="text-blue-600 hover:text-blue-800">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>
    </div>

    @livewireScripts
</body>
</html>