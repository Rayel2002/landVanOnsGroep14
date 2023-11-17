<?php

namespace App\Http\Controllers;

use App\Models\Event;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{

    public function index($event_name)
    {
        $event = Event::where('event_name', '=', $event_name)->first();
        return view('detail', compact('event_name'))->with('event', $event);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form')->with('date_error');
    }

    public function show()
    {
        $events = Event::where('begin_time', '>', DATE(NOW()))->get();

//        dd($events);
        return view('home')->with('events', $events);
    }

    public function filter_event(Request $request)
    {
        $events = Event::where('event_name', 'like', "%" . $request->nonFilteredEvent . "%")
            ->get();
        return response()->json(['filterEventNames' => $events]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->request);
        $this->middleware('auth');

        if (strtotime($request->begin_time) > strtotime($request->end_time)) {
            return view('form')->with('date_error', 'Begin tijd kan niet later zijn dat eind tijd');
        }

        if (strtotime($request->begin_time) === strtotime($request->end_time)) {
            return view('form')->with('date_error', 'Begin tijd kan niet hetzelfde zijn als eind tijd');
        }

        if (new DateTime($request->begin_time) < new DateTime()) {
            return view('form')->with('date_error', 'Begin tijd kan niet al geweest zijn');
        }


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

        return Redirect::route('event.show');
    }
}
