<?php

namespace App\Http\Controllers;
use App\Models\EventImage;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventImages;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class EventController extends Controller
{
    // Get all events
    public function dashboard()
    {
        $events = Event::withTrashed()->get();

        return view('event.dashboard', compact('events'));
    }

    public function index()
    {
        $events = Event::withTrashed()->get();

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

        $userId = Auth::id();

        // Find the artist record based on the user ID
        $event = Event::where('user_id', $userId)->firstOrFail();

        // Create the artwork
        $event = new Event();
        $event->title = $request->event_title;
        $event->date = $request->event_date;
        $event->price = $request->event_description;
        $event->desc = $request->event_location;
        $event->category = $request->event_category;
        $event->size = $request->event_time;
        $event->status = "available";

        $event->save();

        foreach ($request->file('event_image') as $image) {
            // Store the image file
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            // Create a new ArtImage record
            $eventImage = new EventImage();
            $eventImage->artwork_id = $event->id; // Associate the image with the artwork
            $eventImage->image_path = $imageName;
            $eventImage->save();
        }
        return redirect()->route('artwork.dashboard')->with('success', 'Artwork created successfully.');
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
    public function restore($id)
    {
        // Find the soft-deleted artwork by its ID
        $event = Event::withTrashed()->findOrFail($id);

        // Restore the soft-deleted artwork
        $event->restore();
        return redirect()->back()->with('success', 'Artwork restored successfully.');
    }

}
