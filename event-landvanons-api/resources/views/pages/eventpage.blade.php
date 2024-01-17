@extends('layouts.app')

@section('content')
    <section>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#519238" fill-opacity="1" d="M0,64L1440,224L1440,0L0,0Z"></path>
        </svg>
        <div class="flex mr-40 justify-end ">
            <label class="pr-5 font-bold">Zoeken:</label>
            <input value="evenement..." placeholder="Type to search" type="text"
                   class="flex content-end border-black border-2 rounded"/>
        </div>
        <div class="flex justify-center space-x-16 pb-20">
            <div class="location-section">
                <div class="flex flex-col">
                    <h2 class="pb-5 font-bold">Locatie</h2>
                    <label class="relative inline-flex items-center cursor-pointer">
                        {{--            <input type="checkbox" data-id="{{$ticket->id}}" class="sr-only peer toggle"/>--}}
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    </label>
                </div>
            </div>
            {{--    <div class="h-[100px] mr-6 bg-black w-[2px]}>--}}
            <form class=" pl-10">
                <h2 class="font-bold">Locatie invoeren:</h2>
                <label>Adres:</label>
                <input type="text" class="border-black border-2 rounded"/>
                <input type="submit" class="confirm-location" value="Bevestig"/>
            </form>
        </div>
        <div class="location-section relative left-52">
        </div>
        </div>
        <div class='event-container pt-20 flex justify-center grid grid-cols-4 gap-2'>
            <div class="col-span-3 flex content-center mx-auto mb-14">
                <div class="flex flex-col">
                    @include('partials.eventcards', ['events' => $events])
                </div>
            </div>
        </div>
    </section>
@endsection
