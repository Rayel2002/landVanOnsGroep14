@extends('layouts.app')

@section('content')
    <style>
        .body-bg {
            background-color: rgb(219, 51, 151);
            background-image: linear-gradient(315deg, rgb(81, 146, 56), rgb(148, 208, 45));
        }
    </style>
    <body class="body-bg ">
    <div class="flex justify-center items-center h-screen">
        <div class="container p-6">
            <div class="rounded-lg shadow-2xl bg-white m-auto w-64">
                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h1 class="text-2xl font-bold mb-4">Homepagina</h1>
                    <div class="flex flex-col items-center p-4">
                        @can('edit-event')
                            <a href="{{ route('event.create') }}" class="bg-fuchsia-500 text-white hover:shadow-xl py-2 px-4 rounded mb-2 border-b font-bold" style="background-color: rgb(219, 51, 151)">Creëer een nieuw evenement</a>
                        @endcan
                        {{-- <a href="{{ route('event.show') }}" class="bg-fuchsia-500 text-white hover:shadow-xl py-2 px-4 rounded mb-2 border-b font-bold" style="background-color: rgb(219, 51, 151)">Aanmelden</a> --}}
                        @can('edit-event')
                            <a href="{{ route('event.adminform') }}" class="bg-fuchsia-500 text-white hover:shadow-xl py-2 px-4 rounded mb-2 border-b font-bold" style="background-color: rgb(219, 51, 151)">Evenement aanpassen</a>
                        @endcan
                            <a href="{{ route('event.eventPage') }}" class="bg-fuchsia-500 text-white hover:bg-lvo-light-green py-2 px-4 rounded mb-2 border-b font-bold" style="background-color: rgb(219, 51, 151)">Inschrijven</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
