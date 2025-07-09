<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|url',
            'is_active' => 'boolean',
            'organizer_name' => 'nullable|string',
        ]);

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event created!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|url',
            'is_active' => 'boolean',
            'organizer_name' => 'nullable|string',
        ]);

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event updated!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted!');
    }
}
