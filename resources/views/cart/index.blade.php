@extends('layout.layout')

@section('content')
@include('layout.artHeader')
@include('layout.artNav')

<!-- Cart Form -->
<div class="container mx-auto mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
    <!-- Product List -->
    <div>
        <h1 class="text-3xl font-bold mb-4">Your Cart</h1>
        <!-- Loop through materialss -->
        @foreach ($cart->material->unique('id') as $materials)
        <div class="bg-white p-2 rounded-lg shadow-md mb-4 flex items-center justify-between">
            <div class="flex items-center">
                <input type="checkbox" class="mr-2">
                <img src="{{ asset('images/' . $materials->image->first()->image_path) }}" alt="{{ $materials->name }}" class="w-24 h-24 object-cover">
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">{{ $materials->name }}</h2>
                    <p class="text-gray-500">${{ $materials->price }}</p>
                    <!-- Quantity input -->
                    <div class="mt-2">
                        <label for="quantity_{{ $materials->id }}" class="text-gray-600">Quantity:</label>
                        <input type="number" id="quantity_{{ $materials->id }}" name="quantity_{{ $materials->id }}" value="{{ $materialQuantities[$materials->id] ?? 0 }}" min="1" class="w-20 px-2 py-1 border rounded-md">
                    </div>
                </div>
            </div>
            <form action="{{ route('cart.material.destroy', $materials->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Remove</button>
            </form>

        </div>
        @endforeach
        <!-- Loop through artworkss -->
        @foreach ($cart->artwork->unique('id') as $artworks)
        <div class="bg-white p-2 rounded-lg shadow-md mb-4 flex items-center justify-between">
            <div class="flex items-center">
                <input type="checkbox" class="mr-2" disabled>
                <img src="{{ asset('images/' . $artworks->image->first()->image_path) }}" alt="{{ $artworks->name }}" class="w-24 h-24 object-cover">
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">{{ $artworks->name }}</h2>
                    <p class="text-gray-500">${{ $artworks->price }}</p>
                    <!-- Quantity input -->
                    <div class="mt-2">
                        <label for="quantity_{{ $artworks->id }}" class="text-gray-600">Quantity:</label>
                        <input type="number" id="quantity_{{ $artworks->id }}" name="quantity_{{ $artworks->id }}" value="{{ $artworkQuantities[$artworks->id] ?? 0 }}" min="1" class="w-20 px-2 py-1 border rounded-md" disabled>
                    </div>
                </div>
            </div>
            <form action="{{ route('cart.artwork.destroy', $artworks->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Remove</button>
            </form>

        </div>
        @endforeach
    </div>

    <!-- Order Summary -->
    <div>
        <h1 class="text-3xl font-bold mb-4">Order Summary</h1>
        <div class="md:col-span-1">
            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                <div class="border-b-2 border-gray-300 pb-2 mb-4">
                    <p class="text-lg">Total Items: {{ $cart->material->count() + $cart->artwork->count() }}</p>
                    <p class="text-lg">Total Price: ${{ $totalPrice }}</p> <!-- Display the total price -->
                </div>
                <div class="flex justify-end">
                    <button class="btn btn-success"><i class="fas fa-cart-shopping"></i> Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
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
