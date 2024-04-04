<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Blog</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
<body>
    <div class="container mt-5">
        <h1>Show Blog</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $blog->title }}</h5>
                <p class="card-text">{{ $blog->content }}</p>
                <a href="{{ route('blogsdashboard') }}" class="btn btn-primary">Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
