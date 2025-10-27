<x-layouts.app.sidebar title="Edit User">
    <div class="space-y-6">
        <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100">Edit User</h1>

        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700">
            <div class="p-6">
                <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:text-zinc-100" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:text-zinc-100" required>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">New Password (leave blank to keep current)</label>
                        <input type="password" name="password" id="password" class="mt-1 block w-full border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:text-zinc-100">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:text-zinc-100">
                        @error('password_confirmation')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="role" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Role</label>
                        <select name="role" id="role" class="mt-1 block w-full border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:text-zinc-100" required>
                            <option value="director" {{ old('role', $user->role) == 'director' ? 'selected' : '' }}>Director</option>
                            <option value="manager" {{ old('role', $user->role) == 'manager' ? 'selected' : '' }}>Manager</option>
                            <option value="editor" {{ old('role', $user->role) == 'editor' ? 'selected' : '' }}>Editor</option>
                            <option value="seo_specialist" {{ old('role', $user->role) == 'seo_specialist' ? 'selected' : '' }}>SEO Specialist</option>
                        </select>
                        @error('role')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 border border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm text-sm font-medium text-zinc-700 dark:text-zinc-300 bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app.sidebar>