<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\MaterialImage;

class MaterialController extends Controller
{
    // public function dashboard()
    //  {
    //      $userId = auth()->id();
    //      $artist = Artist::where('user_id', $userId)->firstOrFail();
    //      $artworks = $artist->artwork()->withTrashed()->get();

    //      return view('artwork.dashboard', compact('artworks'));
    //  }
    // public function index()
    // {
    //     //
    // }
    public function create()
    {
        return view('artwork.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|numeric',
        ]);


        // Create the artwork
        $material = new Material();
        $material->name = $request->name;
        $material->price = $request->price;
        $material->desc = $request->description;
        $material->category = $request->category;
        $material->stock = $request->stock;
        $material->status = "available";
        $material->save();

        foreach ($request->file('images') as $image) {
            // Store the image file
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            // Create a new ArtImage record
            $materialImage = new MaterialImage();
            $materialImage->artwork_id = $material->id; // Associate the image with the artwork
            $materialImage->image_path = $imageName;
            $materialImage->save();
        }
        return redirect()->route('artwork.dashboard')->with('success', 'Artwork created successfully.');
    }
    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */

    //  public function edit($id)
    //  {
    //      $artwork = Artwork::findOrFail($id);
    //      return view('artwork.edit', compact('artwork'));
    //  }

    //  public function update(Request $request, $id)
    //  {
    //     $request->validate([
    //         'artwork_name' => 'nullable|string',
    //         'art_price' => 'nullable|numeric',
    //         'art_description' => 'nullable|string',
    //         'art_category' => 'nullable|string',
    //         'art_size' => 'nullable|string',
    //      ]);
    //      $artwork = Artwork::findOrFail($id);
    //      $artwork->update([
    //          'name' => $request->artwork_name,
    //          'price' => $request->art_price,
    //          'desc' => $request->art_description,
    //          'category' => $request->art_category,
    //          'size' => $request->art_size,
    //      ]);

    //      return redirect()->route('artwork.dashboard')->with('success', 'Artwork updated successfully.');
    //  }
    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy($id)
    // {
    //     $artwork = Artwork::findOrFail($id);
    //     $artwork->delete();

    //     return redirect()->route('artwork.dashboard')->with('success', 'Artwork soft-deleted successfully.');
    // }



    // public function restore($id)
    // {
    //     // Find the soft-deleted artwork by its ID
    //     $artwork = Artwork::withTrashed()->findOrFail($id);

    //     // Restore the soft-deleted artwork
    //     $artwork->restore();
    //     return redirect()->back()->with('success', 'Artwork restored successfully.');
    // }
}
