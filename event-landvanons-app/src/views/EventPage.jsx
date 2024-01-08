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
            <div className='event-container ml-72 grid grid-cols-3 gap-3'>
                    <div className="col-span-2 ml-5 mb-10">
                    {eventComponents}
                    </div>
                </div>
                <div></div>
        </section>
    )
}

export default EventPage;