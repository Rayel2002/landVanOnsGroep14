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

                    </div>
                    @can('edit-event')
                        <a href="{{ route('event.create') }}">create new event</a>
                    @endcan
                    <a href="{{ route('event.show') }}">Aanmelden</a>
                    @can('edit-event')
                        <a href="{{ route('event.adminform') }}">Admin functions</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
