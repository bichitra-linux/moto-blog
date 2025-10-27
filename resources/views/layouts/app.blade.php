<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Moto Blog')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-white">
    <header class="border-b border-gray-200 dark:border-gray-800">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold">Moto Blog</a>

                <nav class="flex items-center gap-4">
                    <a href="{{ route('blog.index') }}" class="hover:text-blue-600">Blog</a>

                    @auth
                        <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="hover:text-blue-600">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
                    @endauth
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="border-t border-gray-200 dark:border-gray-800 mt-12">
        <div class="container mx-auto px-4 py-8">
            <p class="text-center text-gray-600 dark:text-gray-400">
                &copy; {{ date('Y') }} Moto Blog. All rights reserved.
            </p>
        </div>
    </footer>
</body>
</html>