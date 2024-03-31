<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogImage;

class BlogController extends Controller
{
    public function dashboard()
{
    // Retrieve all artworks
    $blogs= Blog::all();

    return view('blogs.blogsdashboard', compact('blogs'));
}

    public function create()
    {
        return view('blogs.create');

    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();
        foreach ($request->file('image') as $image) {
            // Store the image file
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('image'), $imageName);

            // Create a new ArtImage record
            $blogImage = new BlogImage();
            $blogImage->blog_id= $blog->id; // Associate the image with the artwork
            $blogImage->image = $imageName;
            $blogImage->save();
        }
    
        return redirect()->route('blogsdashboard')->with('success', 'Blog created successfully.');
    }

    


    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.update', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    
        $blog = Blog::findOrFail($id);
        $blog->update($request->all());
    
        return redirect()->route('blogsdashboard')->with('success', 'Blog updated successfully.');
    }
    

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogsdashboard')->with('success', 'Blog deleted successfully.');
    }





    //////////////////////////////////////////////////////// multiple image na to tangina
//     public function addimages(Request $request)
//     {
//             $propertyID = session('propertyID');
//             $request->validate([
//                 'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//             ]);

//             $images = $request->file('images');
//             if (!empty($images)) {
//                 foreach ($images as $image) {
//                     $imageName = uniqid() . '_' . $image->getClientOriginalName();
//                     $image->storeAs('images', $imageName, 'public');

//                     Image::create([
//                         'property_id' => $propertyID,
//                         'image' => $imageName,
//                     ]);
//                 }
//                 return redirect()->route('user')->with('success', 'Images uploaded successfully.');
//             }
//             return redirect()->route('imagesproperty')->with('error', 'No images were uploaded.');

//     }


//     public function imagesproperty()
//     {
//         $propertyID = session('propertyID');

//         return view('property.imagesproperty', compact('propertyID'));

// }



}