@extends('layout.layout')

@section('content')
{{-- Artistic banner --}}
@include('layout.cusHeader')

@include('layout.cusNav')
   <div class="bg-cover bg-no-repeat bg-center py-36" style="background-image: url('https://images.pexels.com/photos/1292241/pexels-photo-1292241.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')">
        <div class="container">
            <h1 class="text-4xl text-white font-medium mb-4">
                Art Gallery
            </h1>
            <p class="text-xl text-white font-medium mb-4">
                Welcome to the world of art, where every brushstroke tells a story,<br>
                and every canvas is a window to the soul.
            </p>
            <div class="mt-12 hover:scale-105 hover:shadow-2xl transition">
                <a href="#" class="bg-red-500 text-white px-8 py-3 font-medium rounded-2xl border border-white hover:text-white">Explore Art</a>
            </div>
        </div>
   </div>
{{-- End of artistic banner --}}

{{-- Events Showcase --}}
<div class="container py-16">
    <h2 class="text-4xl font-medium text-gray-800 mb-6 text-center">Events</h2>
    <div class="w-10/12 grid grid-cols-3 gap-6 mx-auto justify-center">
        <!-- Art Event 1 -->
        <div class="border border-primary rounded-md px-3 py-6 flex justify-center items-center gap-5">
            <img src="https://www.svgrepo.com/show/118486/calendar.svg" alt="1f" class="w-auto h-12 object-contain">
            <div>
                <h4 class="font-medium capitalize text-lg">Art Exhibition: "Brushstrokes of Life"</h4>
                <p class="text-gray-500 text-sm">Explore the vibrant world of contemporary art!</p>
            </div>
        </div>

        <!-- Art Event 2 -->
        <div class="border border-primary rounded-md px-3 py-6 flex justify-center items-center gap-5">
            <img src="https://www.svgrepo.com/show/118486/calendar.svg" alt="1f" class="w-auto h-12 object-contain">
            <div>
                <h4 class="font-medium capitalize text-lg">Workshop: "Mastering Mixed Media Techniques"</h4>
                <p class="text-gray-500 text-sm">Unlock your creativity with expert guidance!</p>
            </div>
        </div>

        <!-- Art Event 3 -->
        <div class="border border-primary rounded-md px-3 py-6 flex justify-center items-center gap-5">
            <img src="https://www.svgrepo.com/show/118486/calendar.svg" alt="1f" class="w-auto h-12 object-contain">
            <div>
                <h4 class="font-medium capitalize text-lg">Live Painting Demonstration: "The Art of Expression"</h4>
                <p class="text-gray-500 text-sm">Witness creativity in action!</p>
            </div>
        </div>
    </div>
</div>
{{-- End of Events Showcase --}}



{{-- Browse Art by Categories --}}
<div class="container py-16">
    <h2 class="text-3xl font-medium text-gray-800 mb-6">Explore by Category</h2>

    <div class="grid grid-cols-3 gap-3">
        <!-- Abstract -->
        <div class="relative rounded-sm overflow-hidden group">
            <img src="https://images.pexels.com/photos/1573434/pexels-photo-1573434.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="w-full h-48 object-cover">
            <a href="#" class="absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-50 transition">Abstract</a>
        </div>
        <!-- Surrealism -->
        <div class="relative rounded-sm overflow-hidden group">
            <img src="https://images.pexels.com/photos/288100/pexels-photo-288100.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="w-full h-48 object-cover">
            <a href="#" class="absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-50 transition">Surrealism</a>
        </div>
        <!-- Portraits -->
        <div class="relative rounded-sm overflow-hidden group">
            <img src="https://www.singulart.com/blog/wp-content/uploads/2023/10/Famous-Portrait-Paintings-848x530-1.jpg" class="w-full h-48 object-cover">
            <a href="#" class="absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-50 transition">Portraits</a>
        </div>
        <!-- Impressionism -->
        <div class="relative rounded-sm overflow-hidden group">
            <img src="https://smarthistory.org/wp-content/uploads/2019/04/Monet-Camille.jpg" class="w-full h-48 object-cover">
            <a href="#"  class="absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-50 transition">Impressionism</a>
        </div>
        <!-- Landscapes -->
        <div class="relative rounded-sm overflow-hidden group">
            <img src="https://www.invaluable.com/blog/wp-content/uploads/sites/77/2020/07/CLAUDE-MONET-FIELD-OF-POPPIES-GIVERNY-1.jpg" class="w-full h-48 object-cover">
            <a href="#" class="absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-50 transition">Landscapes</a>
        </div>
        <!-- Still Life -->
        <!-- dadagan to wala tong id sa showproperty -->
        <div class="relative rounded-sm overflow-hidden group">
            <img src="https://cdn-blog.superprof.com/blog_gb/wp-content/uploads/2018/07/Paul_Cézanne_still-life-jug-and-fruits.jpg" class="w-full h-48 object-cover">
            <a href="#" class="absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-50 transition">Still Life</a>
        </div>
    </div>
</div>
{{-- End of Browse Art by Categories --}}
<div class="container py-16">
<h2 class="text-3xl font-medium text-gray-800 mb-6">Browse Artworks</h2>
@include('artwork.index')
</div>

<div class="container py-16">
<h2 class="text-3xl font-medium text-gray-800 mb-6">Shop for Art Materials</h2>
@include('material.index')
</div>

{{-- @include('showmodal') --}}



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
        