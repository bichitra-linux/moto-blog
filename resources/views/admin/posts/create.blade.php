<x-layouts.app.sidebar title="Create New Post">
    <div class="space-y-6">
        <h1 class="text-3xl font-bold text-zinc-800 dark:text-zinc-200">Create New Post</h1>

        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-zinc-200 dark:border-zinc-700 p-6">
            <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required class="w-full px-3 py-2 border border-zinc-300 dark:border-zinc-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-zinc-700 dark:text-zinc-100">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="excerpt" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">Excerpt</label>
                    <textarea id="excerpt" name="excerpt" rows="3" class="w-full px-3 py-2 border border-zinc-300 dark:border-zinc-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-zinc-700 dark:text-zinc-100">{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">Content</label>
                    <textarea id="content" name="content" rows="10" required class="w-full px-3 py-2 border border-zinc-300 dark:border-zinc-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-zinc-700 dark:text-zinc-100">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">Image</label>
                    <input type="file" id="image" name="image" accept="image/*" class="w-full px-3 py-2 border border-zinc-300 dark:border-zinc-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-zinc-700 dark:text-zinc-100 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-3">Publish Status</label>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="radio" id="draft" name="published" value="0" {{ old('published', '0') == '0' ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-zinc-300 dark:border-zinc-600">
                            <label for="draft" class="ml-2 block text-sm text-zinc-700 dark:text-zinc-300">Draft</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="published" name="published" value="1" {{ old('published') == '1' ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-zinc-300 dark:border-zinc-600">
                            <label for="published" class="ml-2 block text-sm text-zinc-700 dark:text-zinc-300">Published</label>
                        </div>
                    </div>
                    @error('published')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div id="published_at_field" style="display: {{ old('published') == '1' ? 'block' : 'none' }};">
                    <label for="published_at" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">Publish Date & Time</label>
                    <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at') }}" class="w-full px-3 py-2 border border-zinc-300 dark:border-zinc-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-zinc-700 dark:text-zinc-100">
                    @error('published_at')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3 justify-end">
                    <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-4 py-2 bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 rounded-lg hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-colors">Cancel</a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">Create Post</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    document.querySelectorAll('input[name="published"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const field = document.getElementById('published_at_field');
            field.style.display = this.value === '1' ? 'block' : 'none';
        });
    });
    </script>
</x-layouts.app.sidebar>