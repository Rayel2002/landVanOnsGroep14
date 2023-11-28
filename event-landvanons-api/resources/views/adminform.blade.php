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
                    <div>
                        <label for="search">Zoek:</label>
                        <input id="search" name="search" type="text">
                        <label for="begin_time_sort">Van:</label>
                        <input id="begin_time_sort" type="datetime-local">
                        <label for="end_time_sort">tot:</label>
                        <input id="end_time_sort" type="datetime-local">
                    </div>
                    @if ($events !== null)
                        @foreach ($events as $event)
                            <div class="events">
                                <a href={{ route('event.index',$event-> event_name) }}><h3>{{ $event->event_name }}</h3>
                                </a>
{{--                                @can('admin-only')--}}
                                    <a href="{{ route('event.edit', $event-> event_name) }}">Update this event</a>
                                <a href="{{ route('event.destroy', $event->event_name) }}" onclick="event.preventDefault();
    if (confirm('Are you sure you want to delete this event?')) document.getElementById('delete-form-{{$event->event_name}}').submit();">
                                    Delete
                                </a>
                                <form id="delete-form-{{$event->event_name}}" action="{{ route('event.destroy', ['event_name' => $event->event_name]) }}" method="post" style="display: none;">
                                    @csrf
                                    @method('delete')
                                </form>


{{--                                @endcan--}}
                                <p>{{ $event->begin_time }} - {{ $event->end_time }}</p>
                            </div>
                        @endforeach
                    @endif
                    <a href="{{ route('event.show') }}">User functions</a>
                    <a href="{{ route('event.adminHome') }}">Admin menu</a>
                </div>
            </div>
        </div>
    </div>
@endsection
