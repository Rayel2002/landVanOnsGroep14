<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationMail;
use App\Models\Event;
use App\Models\User;
use App\Models\Registration;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use Symfony\Component\Console\Input\Input;

class EventController extends Controller
{
    public function home()
    {
        return view('adminHome');
    }

    public function getEventData($event_name)
    {
        $event = Event::where('event_name', '=', $event_name)->first();
        $user = Auth::User();
        return view('eventRegister', compact('event_name', 'user'))->with('event', $event);
    }

    public function registerForEvent($event_name, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $event = Event::where('event_name', '=', $event_name)->first();
        $user = User::where('name', '=', $request->name)->first();

//        if registration has event id && user id return to view with status ('user has already signed up')
        if (Registration::where('user_id', '=', $user->id)->where('event_id', '=', $event->id)->count() !== 0) {
            return back()->withInput()->with('status', 'Je bent al aangemeld voor dit evenement.');
        } else {
            $registration = new Registration;
            $registration->event_id = $event->id;
            $registration->user_id = $user->id;
            $registration->save();

            Mail::to($user->email)->send(
                new ConfirmationMail(
                    $user->name,
                    $event->event_name,
                    $event->begin_time,
                    $event->end_time,
                    $event->street_name,
                    $event->house_number,
                    $event->postal_code
                ));
            return back()->withInput()->with('status', 'Je bent aangemeld voor dit evenement! Check je email voor een confirmatie.');
        }
    }

    public function destroy($event_name) {
        $event = Event::where('event_name', $event_name)->firstOrFail();
        $event->delete();

        // Redirect or respond as needed
        return view('adminHome')->with('status', 'Event deleted successfully');
    }


    public function adminform() {
        $events = Event::where('begin_time', '>', DATE(NOW()))->get();

        return view('adminform')->with('events', $events);
    }

    public function index($event_name) {
        $event = Event::where('event_name', '=', $event_name)->first();
        return view('detail', compact('event_name'))->with('event', $event) ->with('success');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('form')->with('date_error');
    }

    public function edit($event_name) {
        $event = Event::where('event_name', $event_name)->first();
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found');
        }
        return view('update', compact('event_name'))->with('date_error')->with('edit_event', $event);
    }

    public function update(Request $request, $event_name) {
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

        $coord = $this->validateAddress($request->input('street_name'), $request->input('house_number'), $request->input('postal_code'));
        if (!$coord) {
            return redirect()->back()->with('status', 'Controleer of het adres klopt')->withInput();
        }

        // Update the event properties
        $event->event_name = $request->input('event_name');
        $event->begin_time = $request->input('begin_time');
        $event->end_time = $request->input('end_time');
        $event->street_name = $request->input('street_name');
        $event->house_number = $request->input('house_number');
        $event->postal_code = $request->input('postal_code');
        $event->latitude = $coord['latitude'];
        $event->longitude = $coord['longitude'];
        $event->amount_of_volunteers_needed = $request->input('amount_of_volunteers_needed');
        $event->description = $request->input('description');

        // Save the changes
        $event->save();


        $requested_name = $request->input('event_name');
        return view('detail', compact('requested_name'))->with('success', 'Event updated successfully')->with('event', $event);
    }

    public function show() {
        $events = Event::where('begin_time', '>', DATE(NOW()))->get();

        return view('home')->with('events', $events)->with('filters');
    }

    public function toggleFavorite(Event $event)
    {
        $user = Auth::user();

        if ($user->favorites()->where('event_id', $event->id)->exists()) {
            $user->favorites()->detach($event);
            return redirect()->back()->with('status', 'Event removed from favorites.');
        }

        $user->favorites()->attach($event);
        return redirect()->back()->with('status', 'Event added to favorites.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $this->middleware('auth');

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

        if (strtotime($request->begin_time) > strtotime($request->end_time)) {
            return view('form')->with('date_error', 'Begin tijd kan niet later zijn dat eind tijd');
        }

        if (strtotime($request->begin_time) === strtotime($request->end_time)) {
            return view('form')->with('date_error', 'Begin tijd kan niet hetzelfde zijn als eind tijd');
        }

        if (new DateTime($request->begin_time) < new DateTime()) {
            return view('form')->with('date_error', 'Begin tijd kan niet al geweest zijn');
        }


        $coord = $this->getLanLonFromAddress($request->input('street_name'), $request->input('house_number'), $request->input('postal_code'));
        if (!$coord) {
            return redirect()->back()->with('status', 'Controleer of het adres klopt')->withInput();
        }

        $event = new Event;
        $event->event_name = $request->event_name;
        $event->begin_time = $request->begin_time;
        $event->end_time = $request->end_time;
        $event->street_name = $request->street_name;
        $event->house_number = $request->house_number;
        $event->postal_code = $request->postal_code;
        $event->latitude = $coord['latitude'];
        $event->longitude = $coord['longitude'];
        $event->amount_of_volunteers_needed = $request->amount_of_volunteers_needed;
        $event->description = $request->description;
        $event->save();

        return Redirect::route('event.show');
    }

    public function filter(Request $request) {
        /* $ip = $request->ip(); Dynamic IP address */
        $ip = '162.159.24.227'; /* Static IP address */
        $currentUserInfo = Location::get($ip);

        $events = Event::where('begin_time', '>', DATE(NOW()))->get();
        if (Location::get($ip)) {

            $filteredEvents = array();

            foreach ($events as $event) {
                if ($this->getDistanceFromLatLonInKm(
                        $currentUserInfo->latitude,
                        $currentUserInfo->longitude,
                        $event->latitude,
                        $event->longitude) <= (float) $request->input('distance')) {
                    array_push($filteredEvents, $event);
                }
            }
            return view('home')->with('events', $filteredEvents)->with('filters', array($request->input('distance').'km'));
        } else {
            return view('home')->with('events', $events)->status('Je huidige locatie kan niet gebruikt worden om te filteren.')->with('filters');
        }
    }

    /**
     * Calculates the distance between two points using Latitudes and Longitudes.
     * Based on the Haversine formula and this stackoverflow post:
     * https://stackoverflow.com/questions/27928/calculate-distance-between-two-latitude-longitude-points-haversine-formula
     */
    function getDistanceFromLatLonInKm($lat1, $lon1, $lat2, $lon2) {
        $R = 6371; // Radius of the earth in km
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a =
            sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $R * $c; // Distance in km
    }

    function getLanLonFromAddress($streetName, $houseNumber, $postalCode) {
        $address = $streetName . '+'
            . $houseNumber . '+'
            . str_replace(' ', '', $postalCode)
            . '+Nederland';

        // Get JSON results from this request
        $geo = file_get_contents('https://geocode.maps.co/search?q=' . $address);
        $geo = json_decode($geo, true); // Convert the JSON to an array

        $coord = [
            "latitude" => $geo[0]['lat'],// Latitude
            "longitude" => $geo[0]['lon']// Longitude
        ];

        return $coord;
    }
}
