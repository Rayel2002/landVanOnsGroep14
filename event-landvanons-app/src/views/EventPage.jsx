import React, {useEffect, useState} from "react";
import Image1 from '../assets/landvanons-header.jpg'
import Image2 from '../assets/header-image3.jpg'
import locationIcon from '../assets/locatie.png'
import dateIcon from '../assets/date_icon.png'
import timeIcon from '../assets/time_icon.png'
import personIcon from '../assets/icons8-person-48.png'
import bookmarkIcon from '../assets/bookmark.png'
import {Form} from "react-router-dom";
import {data} from "autoprefixer";
import EventCards from "../components/EventCards/EventCards";


function EventPage() {

    const [event, setEvents] = useState([])
    useEffect(() => {
        showEvents()
    }, []);
    const showEvents = async () => {
        const response = fetch('http://127.0.0.1:8000/api/v1/events', {
            headers: {
                'accept': 'application/json'
            },
            method: 'GET'
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                setEvents(data.data)
            }).catch((error) => (console.log(error)))

    }
    const eventComponents = event.map((value) => (<EventCards key={value.id} data={value}/>));
    const totalEvents = eventComponents.length;

    console.log(totalEvents)

    return (
        <section>
            <div className={"flex justify-center space-x-16 pb-20"}>
                <div className={"location-section"}>
                    <div className={"flex flex-col"}>
                        <h2 className={"pb-5 font-bold"}>Locatie</h2>
                        <label className="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" data-id="{{$ticket->id}}" className="sr-only peer toggle"/>
                            <div
                                className="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>
                <div className={"h-[100px] mr-6 bg-black w-[2px]"}>
                    <form className={" w-full pl-10"}>
                        <h2 className={"font-bold"}>Locatie invoeren:</h2>
                        <label>Adres:</label>
                        <input type={"text"} className={"border-black border-2 rounded"}/>
                        <input type={"submit"} className={"confirm-location"} value={"Bevestig"}/>
                    </form>
                </div>
                <div className={"location-section relative left-52"}>
                    <label>Zoeken:</label>
                    <input type={"text"} className={"border-black border-2 rounded"}/>
                </div>
            </div>
            <div className='event-container ml-72 grid grid-cols-3 gap-3'>
                <div className="col-span-2 mt-20 ml-5 mb-14">
                    {eventComponents}
                </div>
            </div>
            <div></div>
        </section>
    )
}

export default EventPage;