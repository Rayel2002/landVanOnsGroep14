@extends('layouts.app')

@section('content')

    @if($success !== null)
        <div>{{$success}}</div>
    @endif
@if ($event !== null)
    <div class="events">
        <h3>{{ $event->event_name }}</h3>
        <p>{{ $event->begin_time }} - {{ $event->end_time }}</p>
        <p>{{ $event->street_name }} {{ $event->house_number }}</p>
        <p>{{ $event->postal_code }}</p>
        <p>{{ $event->description }}</p>
    </div>
@endif
@endsection
