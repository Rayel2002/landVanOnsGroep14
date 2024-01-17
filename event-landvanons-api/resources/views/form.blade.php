@extends('layouts.app')

@section('content')
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                                <style>
                                    .body-bg {
                                        background-color: rgb(219, 51, 151);
                                        background-image: linear-gradient(315deg, rgb(81, 146, 56), rgb(148 ,208, 45));
                                    }
                                </style>
                                <body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:'Source Sans Pro',sans-serif;">

                                <div class="container flex justify-center items-center h-screen">
                                    <div class="rounded-lg overflow-hidden bg-white border border-gray-300">
                                        <div class="p-8">
                                            <h2 class="text-2xl mb-4">{{ __('Evenement aanmaken') }}</h2>
                                            <form method="post" action="{{ route('event.store') }}">
                                                @csrf
                                                <div class="form-group p-2">
                                                    <label for="event_name">Naam:</label>
                                                    <input id="event_name" type="text" name="event_name" class="form-control p-2 border border-black" required>
                                                </div>
                                            @if ($date_error !== null)
                                                    <p class="errors">{{$date_error}}</p>
                                                @endif
                                                <div class="form-group p-2">
                                                    <label for="begin_time">Begin Tijd:</label>
                                                    <input id="begin_time" type="datetime-local" name="begin_time" class="form-control p-2 border border-black"
                                                           required>
                                                </div>
                                                <div class="form-group p-2">
                                                    <label for="end_time">Eind Tijd:</label>
                                                    <input id="end_time" type="datetime-local" name="end_time" class="form-control p-2 border border-black"
                                                           required>
                                                </div>
                                                <div class="form-group p-2">
                                                    <label for="street_name">straatnaam:</label>
                                                    <input id="street_name" type="text" name="street_name" class="form-control p-2 border border-black" required>
                                                </div>
                                                <div class="form-group p-2">
                                                    <label for="house_number">huisnummer:</label>
                                                    <input id="house_number" type="text" name="house_number" class="form-control p-2 border border-black" required>
                                                </div>
                                                <div class="form-group p-2">
                                                    <label for="postal_code">postcode:</label>
                                                    <input id="postal_code" type="text" name="postal_code" class="form-control p-2 border border-black" required
                                                           pattern="[1-9][0-9]{3}\s?[a-zA-Z]{2}">
                                                </div>
                                                <div class="form-group p-2">
                                                    <label for="amount_of_volunteers_needed">Aantal Benodigde Vrijwilligers:</label>
                                                    <input id="amount_of_volunteers_needed" type="number" name="amount_of_volunteers_needed"
                                                           class="form-control p-2 border border-black" required>
                                                </div>
                                                @if ($date_error !== null)
                                                    <p class="errors">{{ $date_error }}</p>
                                                @endif

                                                <div class="mb-4 p-2">
                                                    <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving:</label>
                                                    <textarea id="description" name="description" class="form-input mt-1 block w-full p-2 border border-black" required></textarea>
                                                </div>

                                                <div class="mb-4 p-2">
                                                    <button type="submit" name="submit" class="btn rounded-lg p-2 text-white hover:shadow-xl font-bold" style="background-color: rgb(219, 51, 151);">
                                                        {{ __('Evenement Aanmaken') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </body>
                            @endsection

