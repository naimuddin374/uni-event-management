<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->where('status', 'active')->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,webp|max:5000',
            'status' => 'required|in:active,inactive',
            'author' => Auth::user()->id,
        ]);
        
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img/blogs'), $imageName);
            $data['image'] = 'img/blogs/'.$imageName;
        }
        Blog::create($data);
        return redirect('/admin/blogs');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);  // Find the data or fail with a 404 error
        return view('admin.blogs.edit', compact('blog'));  // Return the edit view with the data
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input data, excluding image for initial validation
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required|in:active,inactive',
            'image' => 'image|mimes:png,jpg,jpeg,webp|max:5000', 
        ]);

        $blog = Blog::findOrFail($id); // Find the blog or fail with a 404 error

        // if(Auth::user()->id !== $blog->author) {
        //     return redirect()->route('admin.blogs.index')
        //     ->with('error', 'You are not authorized to edit this blog');
        // }

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($blog->image) {
                File::delete(public_path($blog->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img/blogs'), $imageName);
            $data['image'] = 'img/blogs/'.$imageName;
        }

        // Update blog with new data
        $blog->update($data);

        return redirect()->route('admin.blogs.index') // Redirect to the blogs index page
        ->with('success', 'Record updated successfully'); // Optional: flash a success message to the session
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $data = Blog::findOrFail($id);  
        
        if ($data->image) {
            File::delete(public_path($data->image));
        }
        
        $data->delete();

        return redirect()->route('admin.blogs.index')  
            ->with('success', 'Record deleted successfully');  
    }
}