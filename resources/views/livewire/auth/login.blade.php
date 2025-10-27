<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Email address</label>
                <input
                    name="email"
                    type="email"
                    id="email"
                    class="mt-1 block w-full border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:text-zinc-100"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="email@example.com"
                />
            </div>

            <!-- Password -->
            <div class="relative">
                <label for="password" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Password</label>
                <input
                    name="password"
                    type="password"
                    id="password"
                    class="mt-1 block w-full border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:text-zinc-100"
                    required
                    autocomplete="current-password"
                    placeholder="Password"
                />

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" wire:navigate class="absolute top-0 right-0 text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input
                    id="remember"
                    name="remember"
                    type="checkbox"
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-zinc-300 dark:border-zinc-600 rounded"
                    {{ old('remember') ? 'checked' : '' }}
                >
                <label for="remember" class="ml-2 block text-sm text-zinc-900 dark:text-zinc-100">
                    {{ __('Remember me') }}
                </label>
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-test="login-button">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-600 dark:text-zinc-400">
                <span>{{ __('Don\'t have an account?') }}</span>
                <a href="{{ route('register') }}" wire:navigate class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">{{ __('Sign up') }}</a>
            </div>
        @endif
    </div>
</x-layouts.auth>
