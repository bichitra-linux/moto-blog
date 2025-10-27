<x-layouts.app.sidebar title="Dashboard">
    <div class="space-y-6">
        <div>
            <h1 class="text-3xl font-bold text-zinc-800 dark:text-zinc-200">Dashboard</h1>
            <p class="text-zinc-600 dark:text-zinc-400 mt-2">Welcome back, {{ auth()->user()->name }}!</p>
            <p class="text-sm text-zinc-500">Role: {{ ucfirst(str_replace('_', ' ', auth()->user()->role)) }}</p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Quick Stats -->
            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
                <h3 class="text-lg font-semibold text-zinc-800 dark:text-zinc-200 mb-2">Your Posts</h3>
                <p class="text-3xl font-bold text-blue-600">{{ auth()->user()->posts()->count() }}</p>
                <p class="text-sm text-zinc-500">Total posts created</p>
            </div>

            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
                <h3 class="text-lg font-semibold text-zinc-800 dark:text-zinc-200 mb-2">Published Posts</h3>
                <p class="text-3xl font-bold text-green-600">{{ auth()->user()->posts()->where('published', true)->count() }}</p>
                <p class="text-sm text-zinc-500">Live on the blog</p>
            </div>

            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
                <h3 class="text-lg font-semibold text-zinc-800 dark:text-zinc-200 mb-2">Draft Posts</h3>
                <p class="text-3xl font-bold text-yellow-600">{{ auth()->user()->posts()->where('published', false)->count() }}</p>
                <p class="text-sm text-zinc-500">Waiting to be published</p>
            </div>
        </div>

        <!-- Role-specific sections -->
        @if(auth()->user()->isDirector())
            <div>
                <h2 class="text-2xl font-bold text-zinc-800 dark:text-zinc-200">Director Panel</h2>
                <div class="grid gap-4 md:grid-cols-2 mt-4">
                    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
                        <h3 class="font-semibold text-purple-800 dark:text-purple-200">User Management</h3>
                        <p class="text-purple-600 dark:text-purple-400">Create and manage user accounts</p>
                        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 mt-3 border border-zinc-300 dark:border-zinc-600 text-zinc-700 dark:text-zinc-300 rounded-lg hover:bg-zinc-50 dark:hover:bg-zinc-700 transition-colors">Manage Users</a>
                    </div>
                    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
                        <h3 class="font-semibold text-blue-800 dark:text-blue-200">Post Management</h3>
                        <p class="text-blue-600 dark:text-blue-400">Review and manage all posts</p>
                        <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-4 py-2 mt-3 border border-zinc-300 dark:border-zinc-600 text-zinc-700 dark:text-zinc-300 rounded-lg hover:bg-zinc-50 dark:hover:bg-zinc-700 transition-colors">Manage Posts</a>
                    </div>
                </div>
            </div>
        @elseif(auth()->user()->isManager())
            <div>
                <h2 class="text-2xl font-bold text-zinc-800 dark:text-zinc-200">Manager Panel</h2>
                <div class="grid gap-4 md:grid-cols-2 mt-4">
                    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
                        <h3 class="font-semibold text-blue-800 dark:text-blue-200">Post Management</h3>
                        <p class="text-blue-600 dark:text-blue-400">Review and manage posts</p>
                        <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-4 py-2 mt-3 border border-zinc-300 dark:border-zinc-600 text-zinc-700 dark:text-zinc-300 rounded-lg hover:bg-zinc-50 dark:hover:bg-zinc-700 transition-colors">Manage Posts</a>
                    </div>
                    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
                        <h3 class="font-semibold text-gray-800 dark:text-gray-200">Team Overview</h3>
                        <p class="text-gray-600 dark:text-gray-400">Monitor team performance</p>
                    </div>
                </div>
            </div>
        @elseif(auth()->user()->isEditor())
            <div>
                <h2 class="text-2xl font-bold text-zinc-800 dark:text-zinc-200">Editor Panel</h2>
                <div class="grid gap-4 md:grid-cols-2 mt-4">
                    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
                        <h3 class="font-semibold text-blue-800 dark:text-blue-200">Post Management</h3>
                        <p class="text-blue-600 dark:text-blue-400">Create and edit posts</p>
                        <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-4 py-2 mt-3 border border-zinc-300 dark:border-zinc-600 text-zinc-700 dark:text-zinc-300 rounded-lg hover:bg-zinc-50 dark:hover:bg-zinc-700 transition-colors">Manage Posts</a>
                    </div>
                    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
                        <h3 class="font-semibold text-green-800 dark:text-green-200">Create New Post</h3>
                        <p class="text-green-600 dark:text-green-400">Write a new blog post</p>
                        <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center px-4 py-2 mt-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">Create Post</a>
                    </div>
                </div>
            </div>
        @elseif(auth()->user()->isSeoSpecialist())
            <div>
                <h2 class="text-2xl font-bold text-zinc-800 dark:text-zinc-200">SEO Specialist Panel</h2>
                <div class="grid gap-4 md:grid-cols-2 mt-4">
                    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
                        <h3 class="font-semibold text-blue-800 dark:text-blue-200">Post Review</h3>
                        <p class="text-blue-600 dark:text-blue-400">Review posts for SEO optimization</p>
                        <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-4 py-2 mt-3 border border-zinc-300 dark:border-zinc-600 text-zinc-700 dark:text-zinc-300 rounded-lg hover:bg-zinc-50 dark:hover:bg-zinc-700 transition-colors">Review Posts</a>
                    </div>
                    <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
                        <h3 class="font-semibold text-yellow-800 dark:text-yellow-200">SEO Analytics</h3>
                        <p class="text-yellow-600 dark:text-yellow-400">Monitor SEO performance</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Recent Posts -->
        <div>
            <h2 class="text-2xl font-bold text-zinc-800 dark:text-zinc-200">Your Recent Posts</h2>
            @if(auth()->user()->posts()->count() > 0)
                <div class="mt-4 bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-zinc-50 dark:bg-zinc-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Created</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                                @foreach(auth()->user()->posts()->latest()->take(5) as $post)
                                    <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-700">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-zinc-900 dark:text-zinc-100">{{ $post->title }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($post->published)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Published</span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">Draft</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-500 dark:text-zinc-400">{{ $post->created_at->format('M j, Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                @if(auth()->user()->isEditor())
                                                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">Edit</a>
                                                @else
                                                    <a href="{{ route('admin.posts.show', $post) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">View</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                @if(auth()->user()->posts()->count() > 5)
                    <div class="flex justify-center mt-4">
                        <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-4 py-2 bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 rounded-lg hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-colors">View all posts</a>
                    </div>
                @endif
            @else
                <div class="mt-4 bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
                    <p class="text-zinc-500 dark:text-zinc-400">You haven't created any posts yet.</p>
                    @if(auth()->user()->isEditor())
                        <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center px-4 py-2 mt-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">Create your first post</a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</x-layouts.app.sidebar>
