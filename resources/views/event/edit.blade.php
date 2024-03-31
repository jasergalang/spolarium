<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-8">Edit Event</h1>
        <div class="card shadow-lg rounded-lg">
            <div class="card-body p-8">
                <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                        <input type="text" class="form-control rounded-md border-gray-300 w-full py-2 px-4 focus:outline-none focus:border-blue-400" id="title" name="title" value="{{ $event->title }}"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                        <textarea class="form-control rounded-md border-gray-300 w-full py-2 px-4 focus:outline-none focus:border-blue-400" id="description" name="description" rows="4"
                            required>{{ $event->description }}</textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label for="location" class="block text-gray-700 font-bold mb-2">Location</label>
                            <input type="text" class="form-control rounded-md border-gray-300 w-full py-2 px-4 focus:outline-none focus:border-blue-400" id="location" name="location"
                                value="{{ $event->location }}" required>
                        </div>
                        <div>
                            <label for="date" class="block text-gray-700 font-bold mb-2">Date</label>
                            <input type="date" class="form-control rounded-md border-gray-300 w-full py-2 px-4 focus:outline-none focus:border-blue-400" id="date" name="date" value="{{ $event->date }}"
                                required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="time" class="block text-gray-700 font-bold mb-2">Time</label>
                        <input type="time" class="form-control rounded-md border-gray-300 w-full py-2 px-4 focus:outline-none focus:border-blue-400" id="time" name="time" value="{{ $event->time }}"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                        <input type="file" class="form-control rounded-md border-gray-300 w-full py-2 px-4 focus:outline-none focus:border-blue-400" id="image" name="image">
                    </div>
                    <!-- Display existing image -->
                    <div class="mb-6">
                        <label for="existing_image" class="block text-gray-700 font-bold mb-2">Existing Image</label>
                        @if ($event->image)
                        <img src="{{ asset($event->image->image_path) }}" alt="{{ $event->title }}" style="max-width: 100px; max-height: 100px;">
                        @else
                        <p>No Image</p>
                        @endif
                    </div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>
