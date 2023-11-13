<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show() {
        $events = Event::where('begin_time', '>', DATE(NOW()))->get();

//        dd($events);
        return view('home')->with('events', $events);
    }
}
