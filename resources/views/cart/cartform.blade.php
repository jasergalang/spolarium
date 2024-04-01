@extends('layout.layout')

@section('content')
@include('layout.artHeader')
@include('layout.artNav')

<!-- Cart Form -->
<div class="container mx-auto mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
    <!-- Product List -->
    <div>
        <h1 class="text-3xl font-bold mb-4">Your Cart</h1>
        <!-- Product 1 -->
        <div class="bg-white p-2 rounded-lg shadow-md mb-4 flex items-center justify-between">
            <div class="flex items-center">
                <input type="checkbox" class="mr-2">
                <img src="https://static.independent.co.uk/s3fs-public/thumbnails/image/2016/03/10/18/mona-lisa.jpg?width=1200&height=900&fit=crop" alt="Product 1" class="w-24 h-24 object-cover">
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Product 1</h2>
                    <p class="text-gray-500">$99.99</p>
                    <!-- Quantity input -->
                    <div class="mt-2">
                        <label for="quantity_product1" class="text-gray-600">Quantity:</label>
                        <input type="number" id="quantity_product1" name="quantity_product1" value="1" min="1" class="w-20 px-2 py-1 border rounded-md">
                    </div>
                </div>
            </div>
            <button class="btn btn-danger"><i class="fas fa-trash"></i> Remove</button>
        </div>
        <!-- Product 2 -->
        <div class="bg-white p-2 rounded-lg shadow-md mb-4 flex items-center justify-between">
            <div class="flex items-center">
                <input type="checkbox" class="mr-2">
                <img src="https://www.visituffizi.org/img/artworks/botticelli-birth-venus.jpg" alt="Product 2" class="w-24 h-24 object-cover">
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Product 2</h2>
                    <p class="text-gray-500">$149.99</p>
                    <!-- Quantity input -->
                    <div class="mt-2">
                        <label for="quantity_product2" class="text-gray-600">Quantity:</label>
                        <input type="number" id="quantity_product2" name="quantity_product2" value="1" min="1" class="w-20 px-2 py-1 border rounded-md">
                    </div>
                </div>
            </div>
            <button class="btn btn-danger"><i class="fas fa-trash"></i> Remove</button>
        </div>
    </div>

    <!-- Order Summary -->
    <div>
        <h1 class="text-3xl font-bold mb-4">Order Summary</h1>
        <div class="md:col-span-1">
            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                <div class="border-b-2 border-gray-300 pb-2 mb-4">
                    <p class="text-lg">Total Items: 2</p>
                    <p class="text-lg">Total Price: $249.98</p>
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
