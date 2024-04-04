<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto">
        @foreach($blogs as $blog)
            <div class="bg-white shadow-md rounded-lg mb-6">
                @if($blog->images)
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($blog->images as $image)
                            <img src="{{ asset('images/'. $image->image_path) }}" alt="{{ $blog->title }}" class="rounded-lg object-cover w-full h-full">
                        @endforeach
                    </div>
                @endif
                <div class="p-6">
                    <h3 class="text-3xl font-semibold text-gray-800 mb-4">{{ $blog->title }}</h3>
                    <p class="text-gray-700 text-lg leading-relaxed mb-6">{{ $blog->content }}</p>
                    
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
