@extends('layouts.app')

@section('content')
    <style>
        .body-bg {
            background-color: rgb(219, 51, 151);
            background-image: linear-gradient(315deg, rgb(81, 146, 56), rgb(148 ,208, 45));
        }
    </style>
    <body class="antialiased body-bg">
    <div class="container flex justify-center items-center h-screen">
        <div class="container p-16">
            <div class="max-w-[90%] mx-auto max-h-[120%]">
                <div class=" bg-white rounded-lg shadow-2xl mx-auto px-6 object-center">
                    <div class="card-body p-2">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <h1 class="text-2xl font-bold mb-4">Evenementen overzicht</h1>
                    @can('edit-event')
                        <a href="{{ route('event.adminHome') }}" class=" text-white hover:shadow-xl py-2 px-4 rounded mb-2 border-b font-bold" style="background-color: rgb(219, 51, 151)">Terug</a>
                    @endcan
                    <br>
                    <br>
                    {{-- <div class="flex items-center space-x-4 mb-4">
                        <label for="search">Zoek:</label>
                        <input id="search" name="search" type="text">
                        <label for="begin_time_sort">Van:</label>
                        <input id="begin_time_sort" type="datetime-local">
                        <label for="end_time_sort">tot:</label>
                        <input id="end_time_sort" type="datetime-local">
                    </div> --}}
                    @if ($events !== null)
                        @foreach ($events as $event)
                            <div class="events">
                                <a class="text-xl font-bold" href={{ route('event.index', $event->event_name) }}  >{{ $event->event_name }}</a>
                                @can('edit-event')
                                    <p class="text-xl">{{ $event->begin_time }} - {{ $event->end_time }}</p>
                                    <div class="mt-2">

                                        <a href="{{ route('event.edit', $event->event_name) }}"class="bg-red-500 text-white hover:shadow-xl py-2 px-4 rounded mb-2 border-b font-bold" style="background-color: rgb(219, 51, 151)">Evenement aanpassen</a>
                                        <a href="{{ route('event.destroy', $event->event_name) }}" onclick="event.preventDefault();
                                            if (confirm('Are you sure you want to delete this event?')) document.getElementById('delete-form-{{$event->event_name}}').submit();" class="bg-red-500 text-white hover:shadow-xl py-2 px-4 rounded mb-2 border-b font-bold bg-red-600">
                                            Verwijderen
                                        </a>
                                        <form id="delete-form-{{$event->event_name}}"
                                              action="{{ route('event.destroy', ['event_name' => $event->event_name]) }}"
                                              method="post" style="display: none;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </div>
                                    <br>
                                @endcan
{{--                                <a href="{{ route('event.show') }}" class="text-white hover:shadow-xl py-2 px-4 rounded mb-2 border-b font-bold" style="background-color: rgb(219, 51, 151)">User functions</a>--}}
                                <br>
                                <br>
                            </div>
                        @endforeach
                    @endif
                    @can('edit-event')
                        <a href="{{ route('event.adminHome') }}" class=" text-white hover:shadow-xl py-2 px-4 rounded mb-2 border-b font-bold" style="background-color: rgb(219, 51, 151)">Admin menu</a>
                    @endcan

                </div>
            </div>
        </div>
    </div>
    </body>
    @endsection

