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
                        <input list="filteredEventOptions" id="search" name="search" type="text">
                        <datalist id="filteredEventOptions"></datalist>
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
                                <p>{{ $event->begin_time }} - {{ $event->end_time }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
