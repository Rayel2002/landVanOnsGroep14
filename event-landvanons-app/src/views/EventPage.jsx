import React from "react";
import Image1 from '../assets/landvanons-header.jpg'
import Image2 from '../assets/header-image3.jpg'
import locationIcon from '../assets/locatie.png'
import background from '../assets/background-event.jpg'

function EventPage() {
    return (
        <section>
            <div className='event-container ml-52 grid grid-cols-3 gap-3'>
                <div><h2 className="text-xl">Omschrijving</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vestibulum dapibus dui eu
                        maximus. Maecenas sed massa vehicula, tristique sapien vel, egestas tellus. Cras vulputate et
                        neque ut blandit. Fusce suscipit ex felis, quis dapibus nulla vehicula eget. Vivamus iaculis
                        sapien massa, at gravida lacus tempor et. Phasellus luctus justo eget augue bibendum interdum.
                        Sed accumsan commodo sem, sed posuere lectus bibendum a. Donec nec laoreet purus. Vestibulum
                        condimentum malesuada orci, in efficitur orci accumsan sed. Donec a maximus neque, in interdum
                        nisl. Donec quis turpis mauris.</p></div>
                <div className="card shadow-2xl ml-10 mb-10">
                    <div className="card-header"><h1 className="text-2xl text-white">Event 1</h1></div>
                    <div className="flex">
                        <img className="w-80  md:[clip-path:polygon(0%_0%,100%_0%,90%_100%,0%_150%)] h-52"
                             src={Image2}/>
                        <div className="flex flex-col mt-5 ml-7">
                            <ul>
                                <li><img src={locationIcon}/> </li>
                                <li>Den Haag</li>
                                <li>Datum</li>
                                <li>Tijd</li>
                                <li>Tijd</li>
                            </ul>
                        </div>
                    </div>

                    <button>Favoriet</button>
                    <button className="">Inschrijven</button>
                    <button className="">Delen</button>
                </div>
                <div></div>
                <div className="col-span-2 ml-5 mb-10">
                    <div className="card shadow-2xl ml-10">
                        <div className="card-header"><h1 className="text-2xl text-white">Event 1</h1></div>
                        <img className="w-80" src={Image2}/></div>
                </div>
                <div className="rightside-descriptions"><h2 className="text-xl">Omschrijving</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vestibulum dapibus dui eu
                        maximus. Maecenas sed massa vehicula, tristique sapien vel, egestas tellus. Cras vulputate et
                        neque ut blandit. Fusce suscipit ex felis, quis dapibus nulla vehicula eget. Vivamus iaculis
                        sapien massa, at gravida lacus tempor et. Phasellus luctus justo eget augue bibendum interdum.
                        Sed accumsan commodo sem, sed posuere lectus bibendum a. Donec nec laoreet purus. Vestibulum
                        condimentum malesuada orci, in efficitur orci accumsan sed. Donec a maximus neque, in interdum
                        nisl. Donec quis turpis mauris.</p>
                </div>
                <div><h2 className="text-xl">Omschrijving</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vestibulum dapibus dui eu
                        maximus. Maecenas sed massa vehicula, tristique sapien vel, egestas tellus. Cras vulputate et
                        neque ut blandit. Fusce suscipit ex felis, quis dapibus nulla vehicula eget. Vivamus iaculis
                        sapien massa, at gravida lacus tempor et. Phasellus luctus justo eget augue bibendum interdum.
                        Sed accumsan commodo sem, sed posuere lectus bibendum a. Donec nec laoreet purus. Vestibulum
                        condimentum malesuada orci, in efficitur orci accumsan sed. Donec a maximus neque, in interdum
                        nisl. Donec quis turpis mauris.</p></div>
                <div className="col-span-2">
                    <div className="card shadow-2xl ml-10">
                        <div className="card-header"><h1 className="text-2xl text-white">Event 1</h1></div>
                        <img className="w-80" src={Image2}/></div>
                </div>
            </div>
        </section>
    )
}

export default EventPage;