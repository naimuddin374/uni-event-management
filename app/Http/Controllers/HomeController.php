<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Slide;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('serial', 'ASC')->get();
        $events = Event::orderBy('id', 'DESC')->where('status', 'active')->offset(0)->limit(3)->get();
        $blogs = Blog::orderBy('id', 'DESC')->where('status', 'active')->offset(0)->limit(2)->get();
        return view('homepage', compact('slides', 'events', 'blogs'));
    }
    
    public function events()
    {
        $events = Event::orderBy('id', 'DESC')->where('status', 'active')->get();
        return view('events.index', compact('events'));
    }
    
    public function eventDetail($id)
    {
        $event = Event::findOrFail($id);  
        return view('events.details', compact('event'));  
    }
    
    public function blogs()
    {
        $blogs = Blog::orderBy('id', 'DESC')->where('status', 'active')->get();
        return view('blogs.index', compact('blogs'));
    }
    
    public function blogDetail($id)
    {
        $blog = Blog::findOrFail($id);  
        return view('blogs.details', compact('blog'));  
    }

}