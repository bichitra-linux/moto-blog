<x-layouts.public :title="$post->title . ' - Moto Blog'">
    <div class="max-w-4xl mx-auto space-y-8">
        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md overflow-hidden border border-zinc-200 dark:border-zinc-700">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
            @endif

            <div class="p-8">
                <h1 class="text-3xl font-bold text-zinc-800 dark:text-zinc-200 mb-4">{{ $post->title }}</h1>

                <div class="flex items-center gap-4 text-zinc-500 mb-8">
                    <span>By {{ $post->user->name }}</span>
                    <span>{{ $post->published_at->format('F j, Y') }}</span>
                </div>

                <div class="prose dark:prose-invert max-w-none">
                    {!! $post->content !!}
                </div>
            </div>
        </div>

        <div class="flex justify-start">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center px-4 py-2 bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 rounded-lg hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Blog
            </a>
        </div>
    </div>
</x-layouts.public>