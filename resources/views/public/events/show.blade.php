@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $event->title }}</h1>

    @if($event->image)
        <img src="{{ $event->image }}" alt="{{ $event->title }}"
             class="w-full h-64 object-cover rounded-lg shadow mb-6">
    @endif

    <div class="space-y-2 text-gray-700">
        <p><span class="font-semibold">Location:</span> {{ $event->location }}</p>

        <p><span class="font-semibold">Start:</span>
            {{ \Carbon\Carbon::parse($event->start_time)->format('D, M j, Y • H:i') }}
        </p>

        @if($event->end_time)
            <p><span class="font-semibold">End:</span>
                {{ \Carbon\Carbon::parse($event->end_time)->format('D, M j, Y • H:i') }}
            </p>
        @endif

        @if($event->price)
            <p><span class="font-semibold">Price:</span> €{{ number_format($event->price, 2) }}</p>
        @endif

        @if($event->capacity)
            <p><span class="font-semibold">Capacity:</span> {{ $event->capacity }} people</p>
        @endif

        @if($event->organizer_name)
            <p><span class="font-semibold">Organizer:</span> {{ $event->organizer_name }}</p>
        @endif
    </div>

    @if($event->description)
        <div class="mt-6 text-gray-800 leading-relaxed">
            {!! nl2br(e($event->description)) !!}
        </div>
    @endif

    <a href="{{ route('public.events.index') }}"
       class="inline-block mt-8 px-5 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition">
        ← Back to all events
    </a>

    @if(auth()->check())
    @if($event->users->contains(auth()->user()))
        <form action="{{ route('events.unregister', $event) }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Cancel Registration
            </button>
        </form>
    @else
        <form action="{{ route('events.register', $event) }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Register for Event
            </button>
        </form>
    @endif
@endif
</div>
@endsection
