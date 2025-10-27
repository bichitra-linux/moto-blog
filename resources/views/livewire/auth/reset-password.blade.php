<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Reset password')" :description="__('Please enter your new password below')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.update') }}" class="flex flex-col gap-6">
            @csrf
            <!-- Token -->
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Email</label>
                <input
                    name="email"
                    value="{{ request('email') }}"
                    type="email"
                    id="email"
                    class="mt-1 block w-full border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:text-zinc-100"
                    required
                    autocomplete="email"
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
                <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-test="reset-password-button">
                    {{ __('Reset password') }}
                </button>
            </div>
        </form>
    </div>
</x-layouts.auth>
