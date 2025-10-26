@extends('admin.layout')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Create New Blog Post</h1>
</div>

<div class="bg-white shadow rounded-lg p-6">
    <form action="{{ route('admin.blog-posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Excerpt (Optional)</label>
            <textarea name="excerpt" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('excerpt') }}</textarea>
            @error('excerpt')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('content') }}</textarea>
            @error('content')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Featured Image</label>
                <input type="file" name="featured_image" accept="image/*" class="mt-1 block w-full">
                @error('featured_image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                @foreach($tags as $tag)
                    <label class="flex items-center">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-700">{{ $tag->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="mb-4">
            <label class="flex items-center">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <span class="ml-2 text-sm text-gray-700">Publish immediately</span>
            </label>
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.blog-posts.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Create Post</button>
        </div>
    </form>
</div>
@endsection
