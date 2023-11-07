<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function show() {
        $events = Event::select('*')->get();
        return view('welcome')->with('events', $events);
    }
}
