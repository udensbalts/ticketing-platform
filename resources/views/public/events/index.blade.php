@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Upcoming Events</h1>

    @if($events->count())
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($events as $event)
                <div class="bg-white shadow rounded p-4">
                    <h2 class="text-xl font-semibold">{{ $event->title }}</h2>
                    <p class="text-gray-600">{{ $event->location }}</p>
                    <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($event->start_time)->format('F j, Y H:i') }}</p>
                    <a href="{{ route('public.events.show', $event) }}" class="text-blue-600 hover:underline mt-2 inline-block">View Details</a>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $events->links() }}
        </div>
    @else
        <p>No active events available.</p>
    @endif
</div>
@endsection
