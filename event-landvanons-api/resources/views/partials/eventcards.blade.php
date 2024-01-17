<div class="flex justify-between ">
    @foreach($events as $key => $event)
    <div class="card shadow-2xl ml-10 mb-10">
        <div class="card-header"><h1 class="text-2xl text-white">{{$event->event_name}}</h1></div>
        <div class="flex w-96 bg-green-50">
            <img class="w-64 md:[clip-path:polygon(0%_0%,100%_0%,90%_100%,0%_150%)] h-72"
                 src={{asset('/assets/cranberries_plukken.jpg')}}>
            <div class="mt-4 mb-3">
                <ul class='flex flex-col pr-10 text-center'>
                <li><img src="{{asset('/assets/locatie.png')}}"/></li>
                <li>{{$event->street_name}}</li>
                <li class=' mt-5'><img class="w-6 h-6" src="{{asset('/assets/date_icon.png')}}"/></li>
                <li>{{$event->begin_time}}</li>
                <li class='mt-5'><img class='w-6 h-6' src="{{asset('/assets/time_icon.png')}}"/></li>
                <li class='mr-10 mr-20'>12:00</li>
                <li class='mt-5'><img class='w-8 h-8' src="{{asset('/assets/person_icon.png')}}"/></li>
                <li class='mr-10 mr-20'>{{$event->amount_of_volunteers_needed}}</li>
                </ul>
            </div>
        </div>
        <div class="flex pb-5 p-5 mt-3 justify-around">
{{--            {/*<button><img src={bookmarkIcon}/></button>*/}--}}
            <form method="'post">
                @csrf
                <input type="submit"  value="Inschrijven" id="{{$event->id}}" class=' registerButton bg-green-700 text-white'></input>
            </form>
            <div class="flex showcard justify-center items-center overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none">
                <div class="relative w-auto my-6 mx-auto max-w-3xl">
                    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                        <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t ">
                            <h3 class="text-3xl font=semibold">Aangemeld voor evenement: <p>{{$event->event_name}}</p></h3>
                        </div>
                        <div class="relative p-6 flex-auto">
                            <div class={"description-section"}>
                                <p>Bedankt voor je aanmelding! <p>Wij sturen u zo spoedig mogelijk een bevestigingsmail.</p></p>
                            </div>
                        </div>
{{--                        @else--}}
{{--                            <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t ">--}}
{{--                                <h3 class="text-3xl font=semibold">Aanmelden mislukt</h3>--}}
{{--                            </div>--}}
{{--                            <div class="relative p-6 flex-auto">--}}
{{--                                <div class={"description-section"}>--}}
{{--                                    <p>U moet zich eerst aanmelden voordat u kan deelnemen aan dit evenement</p></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                            <button
                                id="closeButton"
                                class=" closeButton text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1"
                                type="button"
                            >
                            Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="detail-card w-48 shadow-2xl text-center relative mb-10 ">
    <div key={1}>
        <h2 class="text-2xl mt-5 pb-5">Details</h2>
        <h3 class="text-xl pb-3">Omschrijving:</h3>
        <div class="w-full  pr-8 description-section">
        <p class="description">{{$event->description}}</p>
    </div>
</div>
<div class="button-section mt-3 flex justify-around">
</div>
<button class='close-button mt-5 ml-auto left-32'></button>
</div>
    @endforeach
</div>

