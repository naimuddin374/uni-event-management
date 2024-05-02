<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('id', 'DESC')->where('status', 'active')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Show the form for editing the specified event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);  // Find the event or fail with a 404 error
        return view('admin.events.edit', compact('event'));  // Return the edit view with the event data
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'event_time' => 'required|date',
            'image' => 'image|mimes:png,jpg,jpeg|max:5000',
            'status' => 'required|in:active,inactive',
            'location' => 'string|max:255',
        ]);
        
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img/events'), $imageName);
            $data['image'] = 'img/events/'.$imageName;
        }
        Event::create($data);
        return redirect()->route('admin.events.index') // Redirect to the events index page
        ->with('success', 'Record created successfully'); // Optional: flash a success message to the session
    }


    /**
     * Update the specified event in storage.
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
            'description' => 'required',
            'event_time' => 'required|date',
            'status' => 'required|in:active,inactive',
            'image' => 'image|mimes:png,jpg,jpeg|max:5000', // Validate image separately
            'location' => 'string|max:255',
        ]);

        $event = Event::findOrFail($id); // Find the event or fail with a 404 error

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($event->image) {
                File::delete(public_path($event->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img/events'), $imageName);
            $data['image'] = 'img/events/'.$imageName;
        }

        // Update event with new data
        $event->update($data);

        return redirect()->route('admin.events.index') // Redirect to the events index page
        ->with('success', 'Record updated successfully'); // Optional: flash a success message to the session
    }

    /**
     * Remove the specified event from storage.
     *
     * @param  int  $id  The ID of the event to delete.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Event::findOrFail($id);  
        
        if ($data->image) {
            File::delete(public_path($data->image));
        }
        
        $data->delete(); 

        return redirect()->route('admin.events.index')  
            ->with('success', 'Record deleted successfully'); 
    }

}