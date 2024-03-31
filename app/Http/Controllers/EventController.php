<?php

namespace App\Http\Controllers;
use App\Models\EventImage;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventImages;
use Illuminate\Support\Facades\Storage;
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
            'event_title' => 'required',
            'event_date' => 'required|date',
            'event_description' => 'required',
            'event_location' => 'required',
            'event_category' => 'required',
            'event_time' => 'required', // Validation for event time
            'event_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image file
        ]);
    
        // Handle file upload
        if ($request->hasFile('event_image')) {
            // Store the uploaded file in the filesystem and get its path
            $imagePath = $request->file('event_image')->store('event_images');
        } else {
            $imagePath = null; // If no image is uploaded
        }
    
        // Create the Event model instance with only the necessary fields
        $event = Event::create([
            'title' => $request->input('event_title'),
            'date' => $request->input('event_date'),
            'description' => $request->input('event_description'),
            'location' => $request->input('event_location'),
            'category' => $request->input('event_category'),
            'time' => $request->input('event_time'),
        ]);
    
        // If image was uploaded, create a corresponding entry in event_images table
        if ($imagePath) {
            $eventImage = EventImage::create([
                'event_id' => $event->id,
                'image_path' => $imagePath,
            ]);
        }
    
        return redirect()->route('event.index')
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
        'description' => 'required',
        'location' => 'required',
        'date' => 'required|date',
        'time' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        // Upload the new image
        $newImagePath = $request->file('image')->store('event_images');

        // Delete old image if exists
        if ($event->image) {
            Storage::delete($event->image->image_path);
        }

        // Update or create a new record in event_images table for the new image
        $eventImage = EventImage::updateOrCreate(
            ['event_id' => $event->id],
            ['image_path' => $newImagePath]
        );
    }

    // Update event details
    $event->title = $request->title;
    $event->description = $request->description;
    $event->location = $request->location;
    $event->date = $request->date;
    $event->time = $request->time;

    // Save changes
    $event->save();

    return redirect()->route('event.index')->with('success', 'Event updated successfully');
}

    // Remove the specified event from the database

    public function destroy(Event $event)
    {
        // Delete associated event image record
        if ($event->image) {
            // Delete image file
            Storage::delete($event->image->image_path);
            // Delete event image record
            $event->image->delete();
        }

        // Delete the event
        $event->delete();

        return redirect()->route('event.index')
            ->with('success', 'Event deleted successfully');
    }

}
