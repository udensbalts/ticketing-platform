<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventRegistrationController extends Controller
{
    public function register(Request $request, Event $event)
    {
        
        if ($event->users()->where('user_id', Auth::id())->exists()) {
            return back()->with('error', 'You are already registered for this event.');
        }

        
        $event->users()->attach(Auth::id());

        return back()->with('success', 'Successfully registered for the event!');
    }

    public function unregister(Request $request, Event $event)
    {
        $event->users()->detach(Auth::id());

        return back()->with('success', 'You have unregistered from the event.');
    }
}
