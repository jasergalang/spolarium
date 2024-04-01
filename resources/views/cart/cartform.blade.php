@extends('layout.authlayout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artwork Shop Cart</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar
<nav class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-2xl font-bold">Artwork Shop</a>
        <div>
            <a href="#" class="mx-2"><i class="fas fa-shopping-cart"></i> Cart</a>
            <a href="#" class="mx-2"><i class="fas fa-user"></i> My Account</a>
        </div>
    </div>
</nav> -->

<!-- Cart Form -->
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-4">Your Cart</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Product 1 -->
        <div class="bg-white p-4 rounded-lg shadow-md">
            <img src="https://static.independent.co.uk/s3fs-public/thumbnails/image/2016/03/10/18/mona-lisa.jpg?width=1200&height=900&fit=crop" alt="Product 1" class="w-full h-48 object-cover mb-4">
            <h2 class="text-lg font-semibold">Product 1</h2>
            <p class="text-gray-500">$99.99</p>
            <button class="btn btn-danger mt-4"><i class="fas fa-trash"></i> Remove</button>
        </div>
        <!-- Product 2 -->
        <div class="bg-white p-4 rounded-lg shadow-md">
            <img src="https://www.visituffizi.org/img/artworks/botticelli-birth-venus.jpg" alt="Product 2" class="w-full h-48 object-cover mb-4">
            <h2 class="text-lg font-semibold">Product 2</h2>
            <p class="text-gray-500">$149.99</p>
            <button class="btn btn-danger mt-4"><i class="fas fa-trash"></i> Remove</button>
        </div>
    </div>
    <div class="flex justify-between items-center mt-8">
        <a href="#" class="text-blue-500"><i class="fas fa-arrow-left"></i> Continue Shopping</a>
        <button class="btn btn-success"><i class="fas fa-cart-shopping"></i> Checkout</button>
    </div>
    <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
        <div class="bg-gray-100 p-4 rounded-lg shadow-md">
            <p class="text-lg">Total Items: 2</p>
            <p class="text-lg">Total Price: $249.98</p>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection