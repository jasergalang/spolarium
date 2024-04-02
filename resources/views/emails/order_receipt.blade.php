<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8 bg-white shadow-md rounded-md">
        <h2 class="text-2xl font-bold mb-6">Order Receipt</h2>
        <p class="mb-4">Thank you for your order!</p>
        
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
        <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
        
        <h3 class="text-lg font-semibold mt-6 mb-4">Ordered Materials:</h3>
        <ul class="list-disc pl-8">
            <li>{{ $order->material->name }} - Quantity: {{ $order->material->pivot->quantity }}</li>
        </ul>

        <h3 class="text-lg font-semibold mt-6 mb-4">Ordered Artworks:</h3>
        <ul class="list-disc pl-8">
            <li>{{ $order->artwork->name }} - Quantity: {{ $order->artwork->pivot->quantity }}</li>
        </ul>
        
        <p class="mt-6">Total: ${{ $order->total }}</p>

        <p class="mt-6">If you have any questions about your order, feel free to contact us.</p>
        
        <p class="mt-6">Thank you!</p>
    </div>
</body>
</html>
