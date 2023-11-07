<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
//        dd($request);
        $event = new Event;
        $event->event_name = $request->event_name;
        $event->begin_time = $request->begin_time;
        $event->end_time = $request->end_time;
        $event->street_name = $request->street_name;
        $event->house_number = $request->house_number;
        $event->postal_code = $request->postal_code;
        $event->amount_of_volunteers_needed = $request->amount_of_volunteers_needed;
        $event->description = $request->description;
        $event->save();
        return Redirect::route('home');
    }
}
