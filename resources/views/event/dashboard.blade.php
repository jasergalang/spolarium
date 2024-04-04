@extends('layout.layout')
@extends('layout.cusNav')
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

        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($events as $event)
                <div class="swiper-slide">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden event-card">

                        @foreach($event->image as $images)
                        <img src="{{ asset('images/' . $images->image_path) }}" alt="Event" class="w-full h-64 object-cover">
                        @endforeach

                        <div class="p-6">
                            <h2 class="font-semibold text-xl mb-2">{{ $event->title }}</h2>
                            <p class="text-gray-600">{{ $event->description }}</p>
                            <div class="mt-4 flex justify-between">
                                <span class="text-gray-500">Date: {{ $event->date }}</span>
                                <button class="px-4 py-2 bg-primary text-white rounded-full">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
@parent

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper('.swiper-container', {
        // Optional parameters
        slidesPerView: 'auto',
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>

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
