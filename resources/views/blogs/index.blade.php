@extends('layout.layout')

@section('content')
    @include('layout.artHeader')
    @include('layout.artNav')

    <div class="container mx-auto mt-8">
        <!-- Artworks Table -->
        <div class="table-responsive">
            <table id="artworkTable" c  lass="table table-bordered table-hover">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($blogs as $blog)
    <tr>
        <td>{{ $blog->title }}</td>
        <td>{{ $blog->content }}</td>
        <td>
            @if ($blog->image)
                <img src="{{ asset($blog->images->first()->url) }}" alt="Blog Image" style="max-width: 100px;">
            @else
                No image available
            @endif
        </td>
        <td class="text-center">
            <button class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#showEventModal{{ $blog->id }}"><i class="fas fa-eye"></i> Show</button>
            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-secondary me-2"><i class="fas fa-edit"></i> Edit</a>
            @if ($blog->trashed())
                {{-- Restore button --}}
                <form method="POST" action="{{ route('blogs.restore', $blog->id) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-sm btn-success me-2">
                        <i class="fas fa-trash-restore"></i> Restore Event
                    </button>
                </form>
            @else
                <button class="btn btn-sm btn-danger" onclick="showDeleteConfirmationModal({{ $blog->id }})"><i class="fas fa-trash"></i> Delete</button>
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
    @foreach ($blogs as $blog)
        Show Event Modal
        <div class="modal fade" id="showEventModal{{ $blog->id }}" tabindex="-1" aria-labelledby="showEventModalLabel{{ $blog->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialo    g-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showEventModalLabel{{ $blog->id }}">{{ $blog->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Blog Title:</strong> {{ $blog->title }}</p>
                        <p><strong>Blog Content:</strong>{{ $blog->content }}</p>
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

    <!-- Show Artwork Modal -->
    <div class="modal fade" id="showBlogModal" tabindex="-1" aria-labelledby="showBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showBlogModalLabel">Artwork</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="https://via.placeholder.com/800x600" class="img-fluid rounded" alt="Blog">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif

    @if ($errors->any())
        <script>
            var errorMessage = @json($errors->all());
            alert(errorMessage.join('\n'));
        </script>
    @endif
@endsection
