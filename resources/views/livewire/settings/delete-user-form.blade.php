<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <h2 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100">{{ __('Delete account') }}</h2>
        <p class="text-sm text-zinc-600 dark:text-zinc-400">{{ __('Delete your account and all of its resources') }}</p>
    </div>

    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" data-test="delete-user-button">
        {{ __('Delete account') }}
    </button>

    <div
        x-show="$wire.showModal || $errors->isNotEmpty()"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 overflow-y-auto"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
    >
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div
                x-show="$wire.showModal || $errors->isNotEmpty()"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-zinc-500 bg-opacity-75 transition-opacity"
                @click="$dispatch('close-modal', 'confirm-user-deletion')"
            ></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                x-show="$wire.showModal || $errors->isNotEmpty()"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom bg-white dark:bg-zinc-800 rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            >
                <form method="POST" wire:submit="deleteUser" class="space-y-6">
                    <div>
                        <h3 class="text-lg font-medium text-zinc-900 dark:text-zinc-100">{{ __('Are you sure you want to delete your account?') }}</h3>

                        <p class="text-sm text-zinc-600 dark:text-zinc-400">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Password</label>
                        <input wire:model="password" type="password" id="password" class="mt-1 block w-full border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 dark:bg-zinc-700 dark:text-zinc-100">
                    </div>

                    <div class="flex justify-end space-x-2 rtl:space-x-reverse">
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm text-sm font-medium text-zinc-700 dark:text-zinc-300 bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" @click="$dispatch('close-modal', 'confirm-user-deletion')">
                            {{ __('Cancel') }}
                        </button>

                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" data-test="confirm-delete-user-button">
                            {{ __('Delete account') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
