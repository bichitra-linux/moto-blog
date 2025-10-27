<x-layouts.auth>
    <div class="mt-4 flex flex-col gap-6">
        <p class="text-center text-sm text-zinc-600 dark:text-zinc-400">
            {{ __('Please verify your email address by clicking on the link we just emailed to you.') }}
        </p>

        @if (session('status') == 'verification-link-sent')
            <p class="text-center text-sm font-medium text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </p>
        @endif

        <div class="flex flex-col items-center justify-between space-y-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    {{ __('Resend verification email') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-zinc-600 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100 cursor-pointer" data-test="logout-button">
                    {{ __('Log out') }}
                </button>
            </form>
        </div>
    </div>
</x-layouts.auth>
