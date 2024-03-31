@extends('layout.layout')

@section('content')
<form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
        @csrf
<div class="container py-6 space-y-5 bg-white">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <!-- Event Title -->
        <div class="p-6 bg-white hover:shadow-2xl rounded-2xl transition mx-5">
            <div class="text-lg font-bold mb-4 border-b">Event Title</div>
            <div class="mx-5 my-10">
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2" for="eventTitle">Title:</label>
                    <input type="text" id="eventTitle" name="event_title" placeholder="Enter event title" class="w-full px-3 py-2 border rounded-md">
                </div>
            </div>
        </div>

        <!-- Event Date -->
        <div class="p-6 bg-white hover:shadow-2xl rounded-2xl transition mx-5">
            <div class="text-lg font-bold mb-4 border-b">Event Date</div>
            <div class="mx-5 my-10">
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2" for="eventDate">Date:</label>
                    <input type="date" id="eventDate" name="event_date" class="w-full px-3 py-2 border rounded-md">
                </div>
            </div>
        </div>

        <!-- Event Time -->
        <div class="p-6 bg-white hover:shadow-2xl rounded-2xl transition mx-5">
            <div class="text-lg font-bold mb-4 border-b">Event Time</div>
            <div class="mx-5 my-10">
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2" for="eventTime">Time:</label>
                    <input type="time" id="eventTime" name="event_time" class="w-full px-3 py-2 border rounded-md">
                </div>
            </div>
        </div>

        <!-- Event Description -->
        <div class="p-6 bg-white hover:shadow-2xl rounded-2xl transition mx-5">
            <div class="text-lg font-bold mb-4 border-b">Event Description</div>
            <div class="mx-5 my-10">
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2" for="eventDescription">Description:</label>
                    <textarea id="eventDescription" name="event_description" placeholder="Enter event description" rows="4" class="w-full px-3 py-2 border rounded-md"></textarea>
                </div>
            </div>
        </div>

        <!-- Event Location -->
        <div class="p-6 bg-white hover:shadow-2xl rounded-2xl transition mx-5">
            <div class="text-lg font-bold mb-4 border-b">Event Location</div>
            <div class="mx-5 my-10">
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2" for="eventLocation">Location:</label>
                    <input type="text" id="eventLocation" name="event_location" placeholder="Enter event location" class="w-full px-3 py-2 border rounded-md">
                </div>
            </div>
        </div>
        <!-- Event Category -->
        <div class="p-6 bg-white hover:shadow-2xl rounded-2xl transition mx-5">
            <div class="text-lg font-bold mb-4 border-b">Event Category</div>
            <div class="mx-5 my-10">
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2" for="eventCategory">Category:</label>
                    <select id="eventCategory" name="event_category" class="w-full px-3 py-2 border rounded-md">
                        <option value="">Select category</option>
                        <option value="Art Exhibition">Art Exhibition</option>
                        <option value="Workshop">Workshop</option>
                        <option value="Performance">Performance</option>
                        <option value="Conference">Conference</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Event Image Upload -->
        <div class="p-6 bg-white hover:shadow-2xl rounded-2xl transition mx-5">
            <div class="text-lg font-bold mb-4 border-b">Event Image</div>
            <div class="mx-5 my-10">
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2" for="eventImage">Upload Image:</label>
                    <input type="file" id="eventImage" name="event_image" class="w-full px-3 py-2 border rounded-md">
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="mx-auto w-64">
        <button id="createEventBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full w-full">Create Event</button>
    </div>
</div>
</form>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


@endsection
