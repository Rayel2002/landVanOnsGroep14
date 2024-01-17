@extends('layouts.app')
@section('content')
    <body class="antialiased">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#519238" fill-opacity="1" d="M0,64L1440,224L1440,0L0,0Z"></path>
    </svg>
    <div class="container">
        <div class="row justify-content-center">
            <div class="flex mr-40 justify-end ">
                <label class="pr-5 font-bold">Zoeken:</label>
                <input value="evenement..." placeholder="Type to search" type="text"
                       class="flex content-end border-black border-2 rounded"/>
            </div>
            <div class="col-md-8">
                <div class="card">
{{--                    <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                    </div>--}}
{{--                    <form method="post" action="{{ route('event.filter')}}">--}}
{{--                        @csrf--}}
{{--                        <!--<label for="search">Zoek:</label>--}}
{{--                        <input id="search" name="search" type="text">--}}
{{--                    <div>--}}
{{--                        <label for="search">Zoek:</label>--}}
{{--                        <input list="filteredEventOptions" id="search" name="search" type="text">--}}
{{--                        <datalist id="filteredEventOptions"></datalist>--}}
{{--                        <label for="begin_time_sort">Van:</label>--}}
{{--                        <input id="begin_time_sort" type="datetime-local">--}}
{{--                        <label for="end_time_sort">tot:</label>--}}
{{--                        <input id="end_time_sort" type="datetime-local">-->--}}
{{--                        <label for="location">Plaats:</label>--}}
{{--                        <input id="location" name="location" type="text">--}}
{{--                        <label for="currentLocation">Huidige locatie?</label>--}}
{{--                        <input id="currentLocation" name="currentLocation" type="checkbox">--}}
{{--                        <label for="distance">Afstand:</label>--}}
{{--                        <input id="distance" name="distance" type="number" required>--}}
{{--                        <button type="submit" name="submit" class="btn btn-primary">filteren</button>--}}
{{--                    </form>--}}
{{--                    @if($filters!== null)--}}
{{--                        @foreach($filters as $filter)--}}
{{--                            <p>{{$filter}}</p>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                    @if ($events !== null)--}}
{{--                        @foreach ($events as $event)--}}
{{--                            <div class="events">--}}
{{--                                <a href="{{ route('event.index', $event->event_name) }}">--}}
{{--                                    <h3>{{ $event->event_name }}</h3>--}}
{{--                                </a>--}}
{{--                                <a href="{{ route('event.getEventData', $event->event_name) }}">Aanmelden voor evenement</a>--}}
{{--                                @can('admin-only')--}}
{{--                                    <a href="{{ route('event.update') }}">Update this event</a>--}}
{{--                                @endcan--}}
{{--                                <p>{{ $event->begin_time }} - {{ $event->end_time }}</p>--}}

{{--                                @auth--}}
{{--                                    @auth--}}
{{--                                        @if (Auth::User()->favorites && Auth::User()->favorites->contains($event))--}}
{{--                                            <form method="POST" action="{{ route('event.toggleFavorite', $event->id) }}">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit">--}}
{{--                                                    {{ Auth::User()->favorites->contains($event) ? 'Remove from Favorites' : 'Add to Favorites' }}--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                            @endif--}}
{{--                                        @endauth--}}

{{--                                    <form method="POST" action="{{ route('event.toggleRegistration', $event->event_name) }}">--}}
{{--                                        @csrf--}}

{{--                                        @if ($isRegistered)--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button type="submit">Unregister from Event</button>--}}
{{--                                        @else--}}
{{--                                            <button type="submit">Register for Event</button>--}}
{{--                                        @endif--}}
{{--                                    </form>--}}
{{--                                @endauth--}}

{{--                            </div>--}}
{{--                        @endforeach--}}

{{--                    @endif--}}
{{--                    @can('edit-event')--}}
{{--                        <a href="{{ route('event.adminform') }}">Admin functions</a>--}}
{{--                    @endcan--}}

{{--                </div>--}}
{{--            </div>--}}
            {{--    <div class="h-[100px] mr-6 bg-black w-[2px]}>--}}
                    <div class=" mx-auto ml-96 pt-20 flex justify-center">
            <form class="">
                <h2 class="font-bold">Locatie invoeren:</h2>
                <label>Adres:</label>
                <input type="text" class="border-black border-2 rounded"/>
                <input type="submit" class="confirm-location" value="Bevestig"/>
            </form>
        </div>
        <div class="location-section relative left-52">
        </div>
        </div>
        <div class='event-container ml-80 grid grid-cols-2 gap-3'>
            <div class="col-span-1 flex mx-auto  mt-20 ml-5 mb-14">
                <div class="pl-60">
                    @include('partials.eventcards', ['events' => $events])
                </div>
            </div>
        </div>
    </section>
@endsection
