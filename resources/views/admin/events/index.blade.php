@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Events</h1>

    @if(session('success'))
        <div class="mb-4 p-4 rounded bg-green-100 text-green-800 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('admin.events.create') }}"
           class="inline-block bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700 transition">
            + Create New Event
        </a>
    </div>

    <div class="bg-white shadow rounded overflow-x-auto">
        <table class="w-full table-auto border-collapse">
            <thead class="bg-gray-100 text-left text-sm text-gray-700">
                <tr>
                    <th class="px-4 py-3 border-b">Title</th>
                    <th class="px-4 py-3 border-b">Location</th>
                    <th class="px-4 py-3 border-b">Start Time</th>
                    <th class="px-4 py-3 border-b">Active</th>
                    <th class="px-4 py-3 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-800">
                @forelse($events as $event)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">{{ $event->title }}</td>
                        <td class="px-4 py-3 border-b">{{ $event->location }}</td>
                        <td class="px-4 py-3 border-b">{{ $event->start_time->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-3 border-b">
                            <span class="inline-block px-2 py-1 text-xs font-semibold rounded 
                                {{ $event->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $event->is_active ? 'Yes' : 'No' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 border-b text-center">
                            <a href="{{ route('admin.events.edit', $event) }}"
                               class="inline-block text-yellow-600 hover:text-yellow-800 mr-2">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('admin.events.destroy', $event) }}"
                                  method="POST" class="inline-block"
                                  onsubmit="return confirm('Delete this event?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800">
                                    🗑️ Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">No events found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $events->links() }}
    </div>
</div>
@endsection
