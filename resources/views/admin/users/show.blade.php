<x-layouts.app.sidebar :title="$user->name">
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100">{{ $user->name }}</h1>
            <div class="flex gap-2">
                <a href="{{ route('admin.users.edit', $user) }}" class="inline-flex items-center px-3 py-2 border border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm text-sm font-medium text-zinc-700 dark:text-zinc-300 bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Edit
                </a>
                @if($user->id !== auth()->id())
                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Are you sure you want to delete this user?')">
                            Delete
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700">
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Email</h3>
                        <p class="mt-1 text-sm text-zinc-900 dark:text-zinc-100">{{ $user->email }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Role</h3>
                        <div class="mt-1">
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
                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Created At</h3>
                        <p class="mt-1 text-sm text-zinc-900 dark:text-zinc-100">{{ $user->created_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Last Updated</h3>
                        <p class="mt-1 text-sm text-zinc-900 dark:text-zinc-100">{{ $user->updated_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>
                </div>

                @if($user->posts->count() > 0)
                    <hr class="border-zinc-200 dark:border-zinc-700">

                    <div>
                        <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Posts ({{ $user->posts->count() }})</h3>
                        <div class="mt-3 space-y-3">
                            @foreach($user->posts->take(5) as $post)
                                <div class="flex items-center justify-between p-3 bg-zinc-50 dark:bg-zinc-800 rounded-lg">
                                    <div>
                                        <a href="{{ route('admin.posts.show', $post) }}" class="font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">{{ $post->title }}</a>
                                        <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ $post->published ? 'Published' : 'Draft' }}</p>
                                    </div>
                                </div>
                            @endforeach
                            @if($user->posts->count() > 5)
                                <p class="text-sm text-zinc-500 dark:text-zinc-400">... and {{ $user->posts->count() - 5 }} more</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="flex justify-start">
            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-3 py-2 border border-zinc-300 dark:border-zinc-600 rounded-md shadow-sm text-sm font-medium text-zinc-700 dark:text-zinc-300 bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Back to Users
            </a>
        </div>
    </div>
</x-layouts.app.sidebar>