<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Storywriter')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap">
    <link rel="stylesheet" href="{{ ('css/app.css') }}">

</head>
<body class="bg-white text-gray-800">

    {{-- Header --}}
    <header class="p-4 bg-gray-100 shadow">
        <nav class="max-w-4xl mx-auto flex gap-6">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('contact') }}">Contact</a>
            <a href="{{ route('blog') }}">Blog</a>
        </nav>
    </header>

    {{-- Main content --}}
    <main class="max-w-4xl mx-auto p-6">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="text-center text-sm text-gray-500 p-6">
        &copy; {{ date('Y') }} Storywriter
    </footer>

</body>
</html>
