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
            <div class="max-w-[90%] mx-auto h-auto">
                <div class="bg-white rounded-lg shadow-2xl mx-auto px-6 object-center">
                    <div class="card-body p-4">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h2 class="text-2xl font-bold mb-4">Evenement aanpassen</h2>
                        <form method="post" action="{{ route('event.update', $event_name) }}">
                            @csrf
                            <div class="mb-4">
                                <label for="event_name" class="block text-sm font-medium text-gray-700">Naam:</label>
                                <input id="event_name" type="text" name="event_name" class="form-input mt-1 block w-full border bolder-black" required @if($edit_event !== NULL) value="{{$edit_event->event_name}}" @endif>
                            </div>
                            @if ($date_error !== null)
                                <p class="errors"></p>
                            @endif
                            <div class="mb-4">
                                <label for="begin_time" class="block text-sm font-medium text-gray-700">Begin Tijd:</label>
                                <input id="begin_time" type="datetime-local" name="begin_time" class="form-input mt-1 block w-full border bolder-black" required @if($edit_event !== NULL) value="{{$edit_event->begin_time}}" @endif>
                            </div>
                            <div class="mb-4">
                                <label for="end_time" class="block text-sm font-medium text-gray-700">Eind Tijd:</label>
                                <input id="end_time" type="datetime-local" name="end_time" class="form-input mt-1 block w-full border bolder-black" required @if($edit_event !== NULL) value="{{$edit_event->end_time}}" @endif>
                            </div>
                            <div class="mb-4">
                                <label for="street_name" class="block text-sm font-medium text-gray-700">Straatnaam:</label>
                                <input id="street_name" type="text" name="street_name" class="form-input mt-1 block w-full border bolder-black" required @if($edit_event !== NULL) value="{{$edit_event->street_name}}" @endif>
                            </div>
                            <div class="mb-4">
                                <label for="house_number" class="block text-sm font-medium text-gray-700">Huisnummer:</label>
                                <input id="house_number" type="text" name="house_number" class="form-input mt-1 block w-full border bolder-black" required @if($edit_event !== NULL) value="{{$edit_event->house_number}}" @endif>
                            </div>
                            <div class="mb-4">
                                <label for="postal_code" class="block text-sm font-medium text-gray-700">Postcode:</label>
                                <input id="postal_code" type="text" name="postal_code" class="form-input mt-1 block w-full border bolder-black" required pattern="[1-9][0-9]{3}\s?[a-zA-Z]{2}" @if($edit_event !== NULL) value="{{$edit_event->postal_code}}" @endif>
                            </div>
                            <div class="mb-4">
                                <label for="amount_of_volunteers_needed" class="block text-sm font-medium text-gray-700">Aantal Benodigde Vrijwilligers:</label>
                                <input id="amount_of_volunteers_needed" type="number" name="amount_of_volunteers_needed" class="form-input mt-1 block w-full border bolder-black" required @if($edit_event !== NULL) value="{{$edit_event->amount_of_volunteers_needed}}" @endif>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving:</label>
                                <textarea id="description" name="description" class="form-input mt-1 block w-full border bolder-black" required>@if($edit_event !== NULL){{$edit_event->description}}@endif</textarea>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary bg-red-500 text-white hover:shadow-xl py-2 px-4 rounded mb-2 border-b font-bold" style="background-color: rgb(219, 51, 151)">Evenement Aanpassen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
