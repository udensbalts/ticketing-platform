@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">My Events</h1>

    @if($events->isEmpty())
        <p class="text-gray-600">You are not registered for any events yet.</p>
    @else
        <ul class="space-y-4">
            @foreach($events as $event)
                <li class="p-4 border rounded-lg shadow-sm hover:shadow transition">
                    <h2 class="text-lg font-semibold">
                        <a href="{{ route('public.events.show', $event) }}" class="text-blue-600 hover:underline">
                            {{ $event->title }}
                        </a>
                    </h2>
                    <p class="text-gray-500">
                        {{ \Carbon\Carbon::parse($event->start_time)->format('F j, Y H:i') }} 
                        @if($event->location)
                            • {{ $event->location }}
                        @endif
                    </p>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
