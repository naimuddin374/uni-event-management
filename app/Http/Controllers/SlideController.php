<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use File;


class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('serial', 'ASC')->get();
        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slides.create');
    }

    /**
     * Show the form for editing the specified.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);  // Find the slide or fail with a 404 error
        return view('admin.slides.edit', compact('slide'));  // Return the edit view with the slide data
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'serial' => 'required|integer',
            'url' => 'string|nullable',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:15000',
        ]);
        
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img/slides'), $imageName);
            $data['image'] = 'img/slides/'.$imageName;
        }
        Slide::create($data);
        return redirect('/admin/slides');
    }


    /**
     * Update the specified slide in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate input data, excluding image for initial validation
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'serial' => 'required|integer',
            'url' => 'string|nullable',
            'image' => 'image|mimes:png,jpg,jpeg|max:15000',
        ]);

        $element = Slide::findOrFail($id); // Find the element or fail with a 404 error

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($element->image) {
                File::delete(public_path($element->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img/slides'), $imageName);
            $data['image'] = 'img/slides/'.$imageName;
        }

        // Update element with new data
        $element->update($data);

        return redirect()->route('admin.slides.index') // Redirect to the slides index page
        ->with('success', 'Record updated successfully'); // Optional: flash a success message to the session
    }

    /**
     * Remove the specified element from storage.
     *
     * @param  int  $id  The ID of the element to delete.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);  // Find the slide or throw a 404 error if not found
        if ($slide->image) {
            File::delete(public_path($slide->image));
        }
        
        $slide->delete();  // Delete the slide

        return redirect()->route('admin.slides.index')  // Redirect to the list of slides
            ->with('success', 'Record deleted successfully');  // Flash a success message to the session
    }
}