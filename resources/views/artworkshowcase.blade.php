<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artwork Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="md:flex">
                <div class="md:flex-shrink-0">
                    <img class="h-48 w-full object-cover md:w-48" src="artwork_image.jpg" alt="Artwork Image">
                </div>
                <div class="p-8">
                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Artwork Details</div>
                    <a href="#">
                        <h2 class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Artwork Title</h2>
                    </a>
                    <p class="mt-2 text-gray-500">Artist: John Doe</p>
                    <p class="mt-2 text-gray-500">Price: $1000</p>
                    <p class="mt-2 text-gray-500">Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et odio purus.</p>
                    <div class="mt-4">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
