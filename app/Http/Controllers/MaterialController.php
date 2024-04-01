<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\MaterialImage;

class MaterialController extends Controller
{
    public function dashboard()
     {
        $materials = Material::withTrashed()->get();

         return view('material.dashboard', compact('materials'));
     }
    // public function index()
    // {
    //     //
    // }
    public function create()
    {
        return view('material.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'desc' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|numeric',
        ]);


        // Create the artwork
        $material = new Material();
        $material->name = $request->name;
        $material->price = $request->price;
        $material->desc = $request->desc;
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
            $materialImage->material_id = $material->id; // Associate the image with the artwork
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

     public function edit($id)
     {
         $material = Material::findOrFail($id);
         return view('material.edit', compact('material'));
     }

     public function update(Request $request, $id)
     {
        $request->validate([
            'name' => 'nullable|string',
            'price' => 'nullable|numeric',
            'desc' => 'nullable|string',
            'category' => 'nullable|string',
            'stock' => 'nullable|numeric',
         ]);
         $artwork = Material::findOrFail($id);
         $artwork->update([
             'name' => $request->name,
             'price' => $request->price,
             'desc' => $request->desc,
             'category' => $request->category,
             'stock' => $request->stock,
         ]);

         return redirect()->route('material.dashboard')->with('success', 'Artwork updated successfully.');
     }
    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();

        return redirect()->route('material.dashboard')->with('success', 'Artwork soft-deleted successfully.');
    }



    public function restore($id)
    {
        // Find the soft-deleted artwork by its ID
        $material = Material::withTrashed()->findOrFail($id);

        // Restore the soft-deleted artwork
        $material->restore();
        return redirect()->back()->with('success', 'Artwork restored successfully.');
    }
}
