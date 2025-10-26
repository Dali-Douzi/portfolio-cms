@extends('admin.layout')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Edit Project</h1>
</div>

<div class="bg-white shadow rounded-lg p-6">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('description', $project->description) }}</textarea>
            @error('description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Content (Optional)</label>
            <textarea name="content" rows="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('content', $project->content) }}</textarea>
            @error('content')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Featured Image</label>
            @if($project->featured_image)
                <img src="{{ asset('storage/' . $project->featured_image) }}" class="mb-2 h-32 w-auto object-cover">
            @endif
            <input type="file" name="featured_image" accept="image/*" class="mt-1 block w-full">
            @error('featured_image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Tech Stack (comma-separated)</label>
            <input type="text" name="tech_stack" value="{{ old('tech_stack', is_array($project->tech_stack) ? implode(', ', $project->tech_stack) : '') }}" placeholder="Laravel, Vue.js, Tailwind CSS" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @error('tech_stack')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Demo URL</label>
                <input type="url" name="demo_url" value="{{ old('demo_url', $project->demo_url) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('demo_url')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('github_url')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Order</label>
                <input type="number" name="order" value="{{ old('order', $project->order) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <label class="ml-2 text-sm text-gray-700">Featured Project</label>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $project->is_published) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <label class="ml-2 text-sm text-gray-700">Published</label>
            </div>
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Update Project</button>
        </div>
    </form>
</div>
@endsection