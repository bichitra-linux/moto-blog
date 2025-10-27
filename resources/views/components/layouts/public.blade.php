<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Moto Blog' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">
    <header class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <a href="{{ route('home') }}" class="flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <h1 class="text-xl font-semibold text-zinc-800 dark:text-zinc-200">Moto Blog</h1>
        </a>

            <div class="flex-1"></div>

        <nav class="flex items-center space-x-4 rtl:space-x-reverse">
            <a href="{{ route('blog.index') }}" class="text-zinc-600 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100 {{ request()->routeIs('blog.*') ? 'font-semibold' : '' }}" wire:navigate>
                Blog
            </a>

            @auth
                <a href="{{ route('dashboard') }}" class="text-zinc-600 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:navigate>
                    Dashboard
                </a>

                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 text-zinc-600 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                        <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                            {{ auth()->user()->initials() }}
                        </span>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-56 bg-white dark:bg-zinc-800 rounded-md shadow-lg border border-zinc-200 dark:border-zinc-700 z-50">
                        <div class="p-4 border-b border-zinc-200 dark:border-zinc-700">
                            <div class="flex items-center gap-2">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs text-zinc-500">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="py-1">
                            <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-700" wire:navigate>
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Settings
                            </a>
                        </div>

                        <div class="border-t border-zinc-200 dark:border-zinc-700">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-700">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-zinc-600 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:navigate>
                    Login
                </a>
            @endauth
        </nav>
    </header>

    <main class="container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <footer class="border-t border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col items-center justify-between gap-6 md:flex-row">
                <div class="flex flex-col items-center gap-4 px-8 text-center md:flex-row md:gap-6 lg:px-0">
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">
                        &copy; {{ date('Y') }} Moto Blog. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>