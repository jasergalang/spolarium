<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Get all events
    public function index()
    {
        $events = Event::all();
        return view('event.index', compact('events'));
    }

    // Show the form for creating a new event
    public function create()
    {
        return view('event.create');
    }

    // Store a newly created event in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'location' => 'required',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Event created successfully.');
    }

    // Show the form for editing the specified event
    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    // Update the specified event in the database
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'location' => 'required',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Event updated successfully');
    }

    // Remove the specified event from the database
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event deleted successfully');
    }
}
