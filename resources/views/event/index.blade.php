@extends('layout.layout')

@section('content')
    @include('layout.artHeader')
    @include('layout.artNav')

    <div class="container mx-auto mt-8">
        <!-- Artworks Table -->
        <div class="table-responsive">
            <table id="artworkTable" class="table table-bordered table-hover">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->date }}</td>
                            <td><span id="eventTimeFormatted{{ $event->id }}"></span></td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->category }}</td>
                            <td>
                            @if ($event->images)
    @foreach ($event->images as $image)
        <img src="{{ asset('storage/event_images/' . $image->image_path) }}" alt="{{ $event->title }}" style="max-width: 300px; max-height: 300px;">
    @endforeach
@else
    No Image
@endif

                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#showEventModal{{ $event->id }}"><i class="fas fa-eye"></i> Show</button>
                                <a href="{{ route('event.edit', $event->id) }}" class="btn btn-sm btn-secondary me-2"><i class="fas fa-edit"></i> Edit</a>
                                @if ($event->trashed())
                                    {{-- Restore button --}}
                                    <form method="POST" action="{{ route('event.restore', $event->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-success me-2">
                                            <i class="fas fa-trash-restore"></i> Restore Event
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-sm btn-danger" onclick="showDeleteConfirmationModal({{ $event->id }})"><i class="fas fa-trash"></i> Delete</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this event?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteEventForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($events as $event)
        <!-- Show Event Modal -->
        <div class="modal fade" id="showEventModal{{ $event->id }}" tabindex="-1" aria-labelledby="showEventModalLabel{{ $event->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialo    g-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showEventModalLabel{{ $event->id }}">{{ $event->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Event Date:</strong> {{ $event->date }}</p>
                        <p><strong>Event Time:</strong> <span id="eventTimeFormattedForModal{{ $event->id }}"></span></p>
                        <p><strong>Event Description:</strong> {{ $event->description }}</p>
                        <p><strong>Event Location:</strong> {{ $event->location }}</p>
                        <p><strong>Event Category:</strong> {{ $event->category }}</p>
                        <p><strong>Event Image:</strong></p>
                        <div class="text-center">
                        @if ($event->images)
    @foreach ($event->images as $image)
        <img src="{{ asset('storage/event_images/' . $image->image_path) }}" alt="{{ $event->title }}" style="max-width: 300px; max-height: 300px;">
    @endforeach
@else
    No Image
@endif

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            $('#artworkTable').DataTable();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($events as $event)
                var eventTime{{ $event->id }} = "{{ $event->time }}"; // Assuming $event->time contains the time value from the database

                var timeParts{{ $event->id }} = eventTime{{ $event->id }}.split(':');
                var hours{{ $event->id }} = parseInt(timeParts{{ $event->id }}[0], 10);
                var minutes{{ $event->id }} = timeParts{{ $event->id }}[1];

                var period{{ $event->id }} = (hours{{ $event->id }} >= 12) ? 'PM' : 'AM';
                hours{{ $event->id }} = (hours{{ $event->id }} % 12 === 0) ? 12 : hours{{ $event->id }} % 12;

                var formattedHours{{ $event->id }} = (hours{{ $event->id }} < 10 ? '0' : '') + hours{{ $event->id }};
                var formattedMinutes{{ $event->id }} = (minutes{{ $event->id }} < 10 ? '0' : '') + minutes{{ $event->id }};

                var formattedTime{{ $event->id }} = formattedHours{{ $event->id }} + ':' + formattedMinutes{{ $event->id }} + ' ' + period{{ $event->id }};
                document.getElementById('eventTimeFormatted{{ $event->id }}').textContent = formattedTime{{ $event->id }};
            @endforeach
        });
    </script>

    <script>
        function showDeleteConfirmationModal(eventId) {
            var form = document.getElementById('deleteEventForm');
            form.action = "{{ url('events') }}/" + eventId;
            var modal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
            modal.show();
        }
    </script>
@endsection