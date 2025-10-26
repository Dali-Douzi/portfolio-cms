@extends('admin.layout')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Projects</dt>
                        <dd class="text-3xl font-semibold text-gray-900">{{ $stats['projects'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-5 py-3">
            <a href="{{ route('admin.projects.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">View all</a>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Blog Posts</dt>
                        <dd class="text-3xl font-semibold text-gray-900">{{ $stats['blog_posts'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-5 py-3">
            <a href="{{ route('admin.blog-posts.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">View all</a>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Categories</dt>
                        <dd class="text-3xl font-semibold text-gray-900">{{ $stats['categories'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-5 py-3">
            <a href="{{ route('admin.categories.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">View all</a>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Tags</dt>
                        <dd class="text-3xl font-semibold text-gray-900">{{ $stats['tags'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-5 py-3">
            <a href="{{ route('admin.tags.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">View all</a>
        </div>
    </div>
</div>

<div class="mt-8 bg-white shadow rounded-lg p-6">
    <h2 class="text-xl font-semibold text-gray-900 mb-4">Quick Actions</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
            New Project
        </a>
        <a href="{{ route('admin.blog-posts.create') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
            New Blog Post
        </a>
        <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
            New Category
        </a>
        <a href="{{ route('admin.tags.create') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
            New Tag
        </a>
    </div>
</div>
@endsection