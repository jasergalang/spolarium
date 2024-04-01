<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogImage; // Ensure correct namespace
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function dashboard()
    {
        // Retrieve all blog posts
        $blogs = Blog::withTrashed()->get();

        return view('blogs.index', compact('blogs'));
    }

    public function index()
    {
        // Retrieve all blog posts
        $blogs = Blog::withTrashed()->get();

        return view('blogs.index', compact('blogs'));
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
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust image validation rules
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();

        foreach ($request->file('image') as $image) {
            // Store the image file
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName); // Adjust file storage path

            // Create a new BlogImage record
            $blogImage = new BlogImage();
            $blogImage->blog_id = $blog->id; // Associate the image with the blog post
            $blogImage->image = $imageName;
            $blogImage->save();
        }

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
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
            'description' => 'required', // Changed 'content' to 'description' to match form field name
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validating image upload
        ]);
    
        // Find the blog by ID
        $blog = Blog::findOrFail($id);
    
        // Update the blog's title and description
        $blog->title = $request->title;
        $blog->description = $request->description;
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete existing image if present
            if ($blog->image) {
                Storage::delete($blog->image->image_path);
                $blog->image()->delete();
            }
    
            // Store new image
            $imagePath = $request->file('image')->store('images');
            $blog->image()->create(['image_path' => $imagePath]);
        }
    
        // Save changes
        $blog->save();
    
        return redirect()->route('blogs.index', $blog->id)->with('success', 'Blog updated successfully.'); // Redirect to show page after update
    }
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }

    public function restore($id)
    {
        // Find the soft-deleted blog post by its ID
        $blog = Blog::withTrashed()->findOrFail($id);

        // Restore the soft-deleted blog post
        $blog->restore();
        return redirect()->back()->with('success', 'Blog restored successfully.');
    }
}
