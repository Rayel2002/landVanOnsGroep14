@extends('layouts.app')

@section('content')

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
                        <h2>Aanmelden voor het evenement: {{ $event->event_name }}</h2>
                        <form method="post" action="{{route('event.registerForEvent',[$event->event_name])}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Naam:</label>
                                <input id="name" type="text" name="name" class="form-control"
                                       @if(Auth::check()) value="{{$user->name}}" @endif>
                            </div>
                            <div class="form-group">
                                <label for="email">Email adres</label>
                                <input id="email" type="email" name="email" class="form-control" @if(Auth::check()) value="{{$user->email}}" @endif required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Aanmelden</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>`
