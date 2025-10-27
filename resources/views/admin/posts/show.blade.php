<x-layouts.app.sidebar :title="$post->title">
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold text-zinc-800 dark:text-zinc-200">{{ $post->title }}</h1>
            <div class="flex-1"></div>
            <div class="flex gap-2">
                <a href="{{ route('admin.posts.edit', $post) }}" class="inline-flex items-center px-3 py-1.5 border border-zinc-300 dark:border-zinc-600 text-zinc-700 dark:text-zinc-300 rounded-lg hover:bg-zinc-50 dark:hover:bg-zinc-700 transition-colors text-sm">Edit</a>
                <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                </form>
            </div>
        </div>

        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
            <div class="space-y-6">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full max-w-md rounded-lg">
                @endif

                @if($post->excerpt)
                    <div>
                        <h3 class="text-lg font-semibold text-zinc-800 dark:text-zinc-200 mb-2">Excerpt</h3>
                        <p class="text-lg text-zinc-600 dark:text-zinc-400">{{ $post->excerpt }}</p>
                    </div>
                @endif

                <div>
                    <h3 class="text-lg font-semibold text-zinc-800 dark:text-zinc-200 mb-2">Content</h3>
                    <div class="prose prose-zinc dark:prose-invert max-w-none">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>

                <hr class="border-zinc-200 dark:border-zinc-700">

                <div class="flex items-center justify-between text-sm text-zinc-500 dark:text-zinc-400">
                    <div class="flex items-center gap-4">
                        <span>By {{ $post->user->name }}</span>
                        <span>{{ $post->published_at ? $post->published_at->format('F j, Y \a\t g:i A') : $post->created_at->format('F j, Y \a\t g:i A') }}</span>
                    </div>
                    @if($post->published)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Published</span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">Draft</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="flex justify-start">
            <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-4 py-2 bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 rounded-lg hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-colors">Back to Posts</a>
        </div>
    </div>
</x-layouts.app.sidebar>