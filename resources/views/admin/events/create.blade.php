@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-6">Create New Event</h1>


    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.events.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Location *</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time *</label>
                <input type="datetime-local" name="start_time" id="start_time" value="{{ old('start_time') }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                <input type="datetime-local" name="end_time" id="end_time" value="{{ old('end_time') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="capacity" class="block text-sm font-medium text-gray-700">Capacity *</label>
                <input type="number" name="capacity" id="capacity" value="{{ old('capacity') }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price (€) *</label>
                <input type="number" name="price" id="price" step="0.01" value="{{ old('price') }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image URL</label>
                <input type="url" name="image" id="image" value="{{ old('image') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="organizer_name" class="block text-sm font-medium text-gray-700">Organizer Name</label>
                <input type="text" name="organizer_name" id="organizer_name" value="{{ old('organizer_name') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
        </div>

        <div class="flex items-center space-x-2">
            <input type="checkbox" name="is_active" id="is_active" {{ old('is_active') ? 'checked' : '' }}
                   class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <label for="is_active" class="text-sm text-gray-700">Active</label>
        </div>

        <div class="flex justify-between items-center pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                Create Event
            </button>
            <a href="{{ route('admin.events.index') }}" class="text-gray-600 hover:underline text-sm">← Back</a>
        </div>
    </form>
</div>
@endsection
