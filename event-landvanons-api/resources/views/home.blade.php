@extends('layouts.app')

@section('content')
    <body class="antialiased">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    </div>
                    <form method="post" action="{{ route('event.filter')}}">
                        @csrf
                        <!--<label for="search">Zoek:</label>
                        <input id="search" name="search" type="text">
                    <div>
                        <label for="search">Zoek:</label>
                        <input list="filteredEventOptions" id="search" name="search" type="text">
                        <datalist id="filteredEventOptions"></datalist>
                        <label for="begin_time_sort">Van:</label>
                        <input id="begin_time_sort" type="datetime-local">
                        <label for="end_time_sort">tot:</label>
                        <input id="end_time_sort" type="datetime-local">-->
                        <label for="location">Plaats:</label>
                        <input id="location" name="location" type="text">
                        <label for="currentLocation">Huidige locatie?</label>
                        <input id="currentLocation" name="currentLocation" type="checkbox">
                        <label for="distance">Afstand:</label>
                        <input id="distance" name="distance" type="number" required>
                        <button type="submit" name="submit" class="btn btn-primary">filteren</button>
                    </form>
                    @if($filters!== null)
                        @foreach($filters as $filter)
                            <p>{{$filter}}</p>
                        @endforeach
                    @endif
                    @if ($events !== null)
                        @foreach ($events as $event)
                            <div class="events">
                                <a href="{{ route('event.index', $event->event_name) }}">
                                    <h3>{{ $event->event_name }}</h3>
                                </a>
                                <a href="{{ route('event.getEventData', $event->event_name) }}">Aanmelden voor evenement</a>
                                @can('admin-only')
                                    <a href="{{ route('event.update') }}">Update this event</a>
                                @endcan
                                <p>{{ $event->begin_time }} - {{ $event->end_time }}</p>

                                @auth
                                    @if (Auth::user()->favorites && Auth::user()->favorites->contains($event))
                                        <form method="POST" action="{{ route('event.toggleFavorite', $event->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                {{ Auth::user()->favorites->contains($event) ? 'Remove from Favorites' : 'Add to Favorites' }}
                                            </button>
                                        </form>

                                    @else
                                        <form method="POST" action="{{ route('event.toggleFavorite', $event->id) }}">
                                            @csrf
                                            <button type="submit">Add to Favorites</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        @endforeach

                    @endif
                    @can('edit-event')
                        <a href="{{ route('event.adminform') }}">Admin functions</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
