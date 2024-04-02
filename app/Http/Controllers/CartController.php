<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Material, Cart, Customer,Artwork};
use Illuminate\Support\Facades\Log;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
        {
            $userId = Auth::id();
            $customer = Customer::where('user_id', $userId)->first();
            $cart = $customer->cart;

            $materialQuantities = $cart->material()->pluck('cart_material.quantity', 'materials.id');
            $artworkQuantities = $cart->artwork()->pluck('artwork_cart.quantity', 'artworks.id');

            $totalPrice = 0;
            $totalPrice1 = 0;
            foreach ($cart->material as $material) {
                // Get the quantity of the current material
                $quantity = $materialQuantities[$material->id] ?? 0;
                $totalPrice += $material->price * $quantity;

            }
            foreach ($cart->artwork as $artwork) {
                // Get the quantity of the current artwork
                $quantity = $artworkQuantities[$artwork->id] ?? 0;
                $totalPrice1 += $artwork->price * $quantity;

            }

            return view('cart.index', compact('cart', 'totalPrice', 'totalPrice1', 'materialQuantities', 'artworkQuantities'));

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
     * */
    //  public function store(Request $request)
    // {
    //     $userId = Auth::id();

    //     $customer = Customer::where('user_id', $userId)->first();
    //     $customerId = $customer->id;

    //     $cart = Cart::firstOrCreate(['customer_id' => $customerId]);
    //     $artworkId = $request->input('artwork_id');
    //     $materialId = $request->input('material_id');
    //     $quantity = $request->input('quantity_' . $materialId);

    //     // Check if the artwork and material are already in the cart
    //     // $existingArtwork = $cart->artwork()->where('artwork_id', $artworkId)->exists();
    //     // $existingMaterial = $cart->material()->where('material_id', $materialId)->exists();

    //     // if ($existingArtwork && $existingMaterial) {
    //     //     return redirect()->back()->with('error', 'Item already exists in the cart.');
    //     // }

    //     // Attach artwork and material to the cart
    //     $cart->artwork()->attach($artworkId, ['created_at' => now(), 'updated_at' => now()]);
    //     $cart->material()->attach($materialId, ['quantity' => $quantity, 'created_at' => now(), 'updated_at' => now()]);

    //     // Optionally, update the quantity of the material if it already exists in the cart
    //     // $cart->materials()->updateExistingPivot($materialId, ['quantity' => $newQuantity]);

    //     // Update material stock
    //     $material = Material::findOrFail($materialId);
    //     $material->stock -= $quantity;
    //     $material->save();

    //     return redirect()->back()->with('success', 'Item added to cart successfully.');
    // }
    public function addArtworkToCart(Request $request)
    {
        $userId = Auth::id();

        $customer = Customer::where('user_id', $userId)->first();
        $customerId = $customer->id;

        $cart = Cart::firstOrCreate(['customer_id' => $customerId]);
        $artworkId = $request->input('artwork_id');

        // Attach artwork to the cart
        $cart->artwork()->attach($artworkId, ['created_at' => now(), 'updated_at' => now()]);

        return redirect()->back()->with('success', 'Artwork added to cart successfully.');
    }

    public function addMaterialToCart(Request $request)
    {
        $userId = Auth::id();

        $customer = Customer::where('user_id', $userId)->first();
        $customerId = $customer->id;

        $cart = Cart::firstOrCreate(['customer_id' => $customerId]);
        $materialId = $request->input('material_id');
        $quantityFieldName = 'quantity_' . $materialId;
        $quantity = $request->input($quantityFieldName);

        // Ensure quantity is not null or empty
        if (!$quantity) {
            return redirect()->back()->with('error', 'Quantity cannot be empty.');
        }

        // Attach material to the cart
        $cart->material()->attach($materialId, ['quantity' => $quantity, 'created_at' => now(), 'updated_at' => now()]);

        // Update material stock
        $material = Material::findOrFail($materialId);
        $material->stock -= $quantity;
        $material->save();

        return redirect()->back()->with('success', 'Material added to cart successfully.');
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
    public function destroyMaterial($id)
    {
        $userId = Auth::id();
        $customer = Customer::where('user_id', $userId)->first();
        $cart = $customer->cart;

        $cart->material()->detach($id);

        return redirect()->route('cart.index')->with('success', 'Material removed from cart successfully.');
    }

    public function destroyArtwork($id)
    {
        $userId = Auth::id();
        $customer = Customer::where('user_id', $userId)->first();
        $cart = $customer->cart;

        // Detach the specific artwork from the cart
        $cart->artwork()->detach($id);

        // Redirect back to the cart page after removal
        return redirect()->route('cart.index')->with('success', 'Artwork removed from cart successfully.');
    }


}
