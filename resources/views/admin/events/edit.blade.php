@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Event</h1>

    <form action="{{ route('admin.events.update', $event) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="title" class="block text-sm font-medium mb-1">Title*</label>
                <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="location" class="block text-sm font-medium mb-1">Location*</label>
                <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="start_time" class="block text-sm font-medium mb-1">Start Time*</label>
                <input type="datetime-local" name="start_time" id="start_time"
                       value="{{ old('start_time', \Carbon\Carbon::parse($event->start_time)->format('Y-m-d\TH:i')) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="end_time" class="block text-sm font-medium mb-1">End Time</label>
                <input type="datetime-local" name="end_time" id="end_time"
                       value="{{ old('end_time', $event->end_time ? \Carbon\Carbon::parse($event->end_time)->format('Y-m-d\TH:i') : '') }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="capacity" class="block text-sm font-medium mb-1">Capacity*</label>
                <input type="number" name="capacity" id="capacity" value="{{ old('capacity', $event->capacity) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium mb-1">Price (€)*</label>
                <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $event->price) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium mb-1">Image URL</label>
                <input type="url" name="image" id="image" value="{{ old('image', $event->image) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="organizer_name" class="block text-sm font-medium mb-1">Organizer Name</label>
                <input type="text" name="organizer_name" id="organizer_name" value="{{ old('organizer_name', $event->organizer_name) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium mb-1">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="flex items-center space-x-3">
            <input class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" type="checkbox"
                   name="is_active" id="is_active" {{ old('is_active', $event->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="text-sm">Active</label>
        </div>

        <div class="flex space-x-3">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Update Event</button>
            <a href="{{ route('admin.events.index') }}"
               class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition">Back</a>
        </div>
    </form>
</div>
@endsection
