<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-6">
            @csrf
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Name</label>
                <input
                    name="name"
                    type="text"
                    id="name"
                    class="mt-1 block w-full border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:text-zinc-100"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Full name"
                />
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Email address</label>
                <input
                    name="email"
                    type="email"
                    id="email"
                    class="mt-1 block w-full border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:text-zinc-100"
                    required
                    autocomplete="email"
                    placeholder="email@example.com"
                />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Password</label>
                <input
                    name="password"
                    type="password"
                    id="password"
                    class="mt-1 block w-full border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:text-zinc-100"
                    required
                    autocomplete="new-password"
                    placeholder="Password"
                />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Confirm password</label>
                <input
                    name="password_confirmation"
                    type="password"
                    id="password_confirmation"
                    class="mt-1 block w-full border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:text-zinc-100"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm password"
                />
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-test="register-user-button">
                    {{ __('Create account') }}
                </button>
            </div>
        </form>

        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            <span>{{ __('Already have an account?') }}</span>
            <a href="{{ route('login') }}" wire:navigate class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">{{ __('Log in') }}</a>
        </div>
    </div>
</x-layouts.auth>
