<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Slide;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('serial', 'ASC')->get();
        $events = Event::orderBy('id', 'DESC')->where('status', 'active')->offset(0)->limit(3)->get();
        return view('homepage', compact('slides', 'events'));
    }
    
    public function events()
    {
        $events = Event::orderBy('id', 'DESC')->where('status', 'active')->get();
        return view('events.index', compact('events'));
    }
    
    public function detail($id)
    {
        $event = Event::findOrFail($id);  
        return view('events.details', compact('event'));  
    }

}