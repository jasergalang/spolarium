@extends('layout.layout')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artwork Shop Event</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS for animations -->
    <style>
        @keyframes floating {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }
        .event-card {
            animation: floating 3s ease-in-out infinite;
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<section class="bg-gray-100 py-20">
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold text-center mb-4">Upcoming Events</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8">
            <!-- Event Card 1 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden event-card">
                <img src="https://via.placeholder.com/400x200" alt="Event" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h2 class="font-semibold text-xl mb-2">Art Exhibition 1</h2>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <div class="mt-4 flex justify-between">
                        <span class="text-gray-500">Date: April 15, 2024</span>
                        <button class="px-4 py-2 bg-primary text-white rounded-full">Register</button>
                    </div>
                </div>
            </div>
            <!-- Event Card 2 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden event-card">
                <img src="https://via.placeholder.com/400x200" alt="Event" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h2 class="font-semibold text-xl mb-2">Art Exhibition 2</h2>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <div class="mt-4 flex justify-between">
                        <span class="text-gray-500">Date: April 20, 2024</span>
                        <button class="px-4 py-2 bg-primary text-white rounded-full">Register</button>
                    </div>
                </div>
            </div>
            <!-- Event Card 3 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden event-card">
                <img src="https://via.placeholder.com/400x200" alt="Event" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h2 class="font-semibold text-xl mb-2">Art Exhibition 3</h2>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <div class="mt-4 flex justify-between">
                        <span class="text-gray-500">Date: April 25, 2024</span>
                        <button class="px-4 py-2 bg-primary text-white rounded-full">Register</button>
                    </div>
                </div>
            </div>
            <!-- Event Card 4 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden event-card">
                <img src="https://via.placeholder.com/400x200" alt="Event" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h2 class="font-semibold text-xl mb-2">Art Exhibition 4</h2>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <div class="mt-4 flex justify-between">
                        <span class="text-gray-500">Date: April 30, 2024</span>
                        <button class="px-4 py-2 bg-primary text-white rounded-full">Register</button>
                    </div>
                </div>
            </div>
            <!-- Event Card 5 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden event-card">
                <img src="https://via.placeholder.com/400x200" alt="Event" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h2 class="font-semibold text-xl mb-2">Art Exhibition 5</h2>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <div class="mt-4 flex justify-between">
                        <span class="text-gray-500">Date: May 5, 2024</span>
                        <button class="px-4 py-2 bg-primary text-white rounded-full">Register</button>
                    </div>
                </div>
            </div>
            <!-- Event Card 6 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden event-card">
                <img src="https://via.placeholder.com/400x200" alt="Event" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h2 class="font-semibold text-xl mb-2">Art Exhibition 6</h2>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <div class="mt-4 flex justify-between">
                        <span class="text-gray-500">Date: May 10, 2024</span>
                        <button class="px-4 py-2 bg-primary text-white rounded-full">Register</button>
                    </div>
                </div>
            </div>
            <!-- End Event Cards -->
        </div>
    </div>
</section>



<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
