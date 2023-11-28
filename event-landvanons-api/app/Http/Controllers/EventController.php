<?php

namespace App\Http\Controllers;

use App\Models\Event;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    public function home()
    {;
        return view('adminHome');
    }

    public function filter_event(Request $request) {
        $events = Event::where('event_name', 'like', "%" . $request->nonFilteredEvent . "%")
            ->get();
        return response()->json(['filterEventNames' => $events]);
    }
    public function destroy($event_name)
    {
        $event = Event::where('event_name', $event_name)->firstOrFail();
        $event->delete();

        // Redirect or respond as needed
        return view('adminHome')->with('status', 'Event deleted successfully');
    }

    public function adminform()
    {
        $events = Event::where('begin_time', '>', DATE(NOW()))->get();

//        dd($events);
        return view('adminform')->with('events', $events);
    }

    public function index($event_name)
    {
        $event = Event::where('event_name', '=', $event_name)->first();
        return view('detail', compact('event_name'))->with('event', $event) ->with('success');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('form')->with('date_error');
    }

    public function edit($event_name)
    {
        $event = Event::where('event_name', $event_name)->first();
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found');
        }
        return view('update', compact('event_name'))->with('date_error')->with('edit_event', $event);
    }

    public function update(Request $request, $event_name)
    {
        $event = Event::where('event_name', $event_name)->first();

        if (!$event) {
            return redirect()->back()->with('error', 'Event not found');
        }

        // Validate the request data
        $request->validate([
            'event_name' => 'required',
            'begin_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:begin_time',
            'street_name' => 'required',
            'house_number' => 'required',
            'postal_code' => 'required|regex:/[1-9][0-9]{3}\s?[a-zA-Z]{2}/',
            'amount_of_volunteers_needed' => 'required|numeric',
            'description' => 'required',
        ]);

        // Update the event properties
        $event->event_name = $request->input('event_name');
        $event->begin_time = $request->input('begin_time');
        $event->end_time = $request->input('end_time');
        $event->street_name = $request->input('street_name');
        $event->house_number = $request->input('house_number');
        $event->postal_code = $request->input('postal_code');
        $event->amount_of_volunteers_needed = $request->input('amount_of_volunteers_needed');
        $event->description = $request->input('description');

        // Save the changes
        $event->save();


        $requested_name = $request->input('event_name');
        return view('detail', compact('requested_name'))->with('success', 'Event updated successfully')->with('event', $event);
    }

    public function show() {
        $events = Event::where('begin_time', '>', DATE(NOW()))->get();

//        dd($events);
        return view('home')->with('events', $events);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
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
