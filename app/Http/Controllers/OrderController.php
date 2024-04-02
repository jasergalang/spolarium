<?php

namespace App\Http\Controllers;

use App\Models\{Order, Material, Artwork, Customer,};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();

        $customer = Customer::where('user_id', $userId)->first();
        $customerId = $customer->id;

        $order = Order::firstOrCreate(['customer_id' => $customerId]);

    $order->shipping_address = $request->input('shipping_address');
    $order->payment_method = $request->input('payment_method');
    $order->status = 'pending'; // Set the initial status as pending
    $order->save();

    // Retrieve material quantities from the input fields
    $materialQuantities = $request->input('material_quantities');
    foreach ($materialQuantities as $materialId => $quantity) {
        if ($quantity > 0) {
            // Insert ordered material into material_order pivot table
            $order->materials()->attach($materialId, ['quantity' => $quantity]);
            // Update material stock
            $material = Material::findOrFail($materialId);
            $material->stock -= $quantity;
            $material->save();
        }
    }

    // Retrieve artwork quantities from the input fields
    $artworkQuantities = $request->input('artwork_quantities');
    foreach ($artworkQuantities as $artworkId => $quantity) {
        if ($quantity > 0) {
            // Insert ordered artwork into artwork_order pivot table
            $order->artworks()->attach($artworkId, ['quantity' => $quantity]);
        }
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
