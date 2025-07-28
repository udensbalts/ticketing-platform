@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-4">{{ $event->title }}</h1>
    
    @if($event->image)
        <img src="{{ $event->image }}" alt="{{ $event->title }}" class="w-full h-auto rounded mb-4">
    @endif

    <p class="text-gray-600 mb-2"><strong>Location:</strong> {{ $event->location }}</p>
    <p class="text-gray-600 mb-2"><strong>Start:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('F j, Y H:i') }}</p>
    @if($event->end_time)
        <p class="text-gray-600 mb-2"><strong>End:</strong> {{ \Carbon\Carbon::parse($event->end_time)->format('F j, Y H:i') }}</p>
    @endif
    <p class="text-gray-600 mb-2"><strong>Organizer:</strong> {{ $event->organizer_name }}</p>
    <p class="mt-4">{{ $event->description }}</p>

    <a href="{{ route('public.events.index') }}" class="inline-block mt-6 text-blue-600 hover:underline">← Back to all events</a>
</div>
@endsection
