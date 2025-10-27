<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Appearance')" :subheading=" __('Update the appearance settings for your account')">
        <div class="flex rounded-md shadow-sm" x-data="{ selected: $persist('light').as('appearance') }">
            <button
                type="button"
                @click="selected = 'light'; $flux.appearance = 'light'"
                :class="selected === 'light' ? 'bg-blue-600 text-white' : 'bg-white dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 border-zinc-300 dark:border-zinc-600'"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium border border-r-0 first:rounded-l-md last:rounded-r-md focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-500"
            >
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                {{ __('Light') }}
            </button>
            <button
                type="button"
                @click="selected = 'dark'; $flux.appearance = 'dark'"
                :class="selected === 'dark' ? 'bg-blue-600 text-white' : 'bg-white dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 border-zinc-300 dark:border-zinc-600'"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium border focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-500"
            >
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                </svg>
                {{ __('Dark') }}
            </button>
            <button
                type="button"
                @click="selected = 'system'; $flux.appearance = 'system'"
                :class="selected === 'system' ? 'bg-blue-600 text-white' : 'bg-white dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 border-zinc-300 dark:border-zinc-600'"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium border border-l-0 last:rounded-r-md focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-500"
            >
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                {{ __('System') }}
            </button>
        </div>
    </x-settings.layout>
</section>
