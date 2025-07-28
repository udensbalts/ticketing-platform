<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    // Visi aktīvie pasākumi
    public function index()
    {
        $events = Event::where('is_active', true)
            ->orderBy('start_time', 'asc')
            ->paginate(9);

        return view('public.events.index', compact('events'));
    }

    // Viena pasākuma skats
    public function show(Event $event)
    {
        abort_unless($event->is_active, 404); // ja nav aktīvs, nerāda

        return view('public.events.show', compact('event'));
    }
}

