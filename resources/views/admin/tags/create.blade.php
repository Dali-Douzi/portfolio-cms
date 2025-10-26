@extends('admin.layout')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Create New Tag</h1>
</div>

<div class="bg-white shadow rounded-lg p-6 max-w-2xl">
    <form action="{{ route('admin.tags.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.tags.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Create Tag</button>
        </div>
    </form>
</div>
@endsection
