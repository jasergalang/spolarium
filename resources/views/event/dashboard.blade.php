@extends('layout.layout')

@section('content')
<!-- Hero Section -->
<section class="bg-gray-100 py-20">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-8">Dashboard</h1>

        <div class="grid grid-cols-3 gap-4">
            @foreach($events as $event)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden event-card">
                @if($event->eventImage)
                <img src="{{ asset('/storage/' . $event->image->image_path) }}" alt="Event" class="w-full h-64 object-cover">
            @else
                <img src="https://via.placeholder.com/400x200" alt="Placeholder Image" class="w-full h-64 object-cover">
            @endif

                <div class="p-6">
                    <h2 class="font-semibold text-xl mb-2">{{ $event->title }}</h2>
                    <p class="text-gray-600">{{ $event->description }}</p>
                    <div class="mt-4 flex justify-between">
                        <span class="text-gray-500">Date: {{ $event->date }}</span>
                        <button class="px-4 py-2 bg-primary text-white rounded-full">Register</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
