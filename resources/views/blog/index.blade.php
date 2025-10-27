<x-layouts.public title="Blog - Moto Blog">
    <div class="space-y-8">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-zinc-800 dark:text-zinc-200">Moto Blog</h1>
            <p class="text-zinc-600 dark:text-zinc-400 mt-2">Discover the latest motorcycle adventures and insights</p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($posts as $post)
                <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md overflow-hidden border border-zinc-200 dark:border-zinc-700">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-2 text-zinc-800 dark:text-zinc-200">
                            <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-blue-600">{{ $post->title }}</a>
                        </h2>
                        <p class="text-zinc-600 dark:text-zinc-400 mb-4">{{ $post->excerpt }}</p>
                        <div class="flex items-center justify-between text-sm text-zinc-500">
                            <span>By {{ $post->user->name }}</span>
                            <span>{{ $post->published_at->format('M j, Y') }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($posts->hasPages())
            <div class="flex justify-center">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</x-layouts.public>