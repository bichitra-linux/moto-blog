<x-layouts.app.sidebar title="Manage Users">
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold text-zinc-800 dark:text-zinc-200">Manage Users</h1>
            <div class="flex-1"></div>
            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Create New User
            </a>
        </div>

        @if($users->count() > 0)
            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-zinc-50 dark:bg-zinc-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Created At</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                            @foreach($users as $user)
                                <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-700">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="font-medium text-zinc-900 dark:text-zinc-100">{{ $user->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-500 dark:text-zinc-400">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($user->role === 'director')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">{{ ucfirst(str_replace('_', ' ', $user->role)) }}</span>
                                        @elseif($user->role === 'manager')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">{{ ucfirst(str_replace('_', ' ', $user->role)) }}</span>
                                        @elseif($user->role === 'editor')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">{{ ucfirst(str_replace('_', ' ', $user->role)) }}</span>
                                        @elseif($user->role === 'seo_specialist')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">{{ ucfirst(str_replace('_', ' ', $user->role)) }}</span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">{{ ucfirst(str_replace('_', ' ', $user->role)) }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-500 dark:text-zinc-400">{{ $user->created_at->format('M j, Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.users.show', $user) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">View</a>
                                            <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">Edit</a>
                                            @if($user->id !== auth()->id())
                                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex justify-center">
                {{ $users->links() }}
            </div>
        @else
            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
                <p class="text-zinc-500 dark:text-zinc-400">No users found. <a href="{{ route('admin.users.create') }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 font-medium">Create your first user</a>.</p>
            </div>
        @endif
    </div>
</x-layouts.app.sidebar>