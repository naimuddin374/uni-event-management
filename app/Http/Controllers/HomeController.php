<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        return view('homepage');
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