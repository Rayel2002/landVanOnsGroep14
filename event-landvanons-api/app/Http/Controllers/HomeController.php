<?php

namespace App\Http\Controllers;

use App\Models\Event;

class HomeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function show() {
        $events = Event::where('begin_time', '>', DATE(NOW()))->get();

//        dd($events);

        return view('welcome')->with('events', $events);
    }
}
