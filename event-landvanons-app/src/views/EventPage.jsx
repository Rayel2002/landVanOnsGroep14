import React from "react";
import Image1 from '../assets/landvanons-header.jpg'
import Image2 from '../assets/header-image3.jpg'
import locationIcon from '../assets/locatie.png'
import dateIcon from '../assets/date_icon.png'
import timeIcon from '../assets/time_icon.png'
import personIcon from '../assets/icons8-person-48.png'
import bookmarkIcon from '../assets/bookmark.png'
import {Form} from "react-router-dom";


function EventPage() {
    return (
        <section>
            <div className='event-container ml-72 grid grid-cols-3 gap-3'>
                <div><h2 className="text-xl">Omschrijving</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vestibulum dapibus dui eu
                        maximus. Maecenas sed massa vehicula, tristique sapien vel, egestas tellus. Cras vulputate et
                        neque ut blandit. Fusce suscipit ex felis, quis dapibus nulla vehicula eget. Vivamus iaculis
                        sapien massa, at gravida lacus tempor et. Phasellus luctus justo eget augue bibendum interdum.
                        Sed accumsan commodo sem, sed posuere lectus bibendum a. Donec nec laoreet purus. Vestibulum
                        condimentum malesuada orci, in efficitur orci accumsan sed. Donec a maximus neque, in interdum
                        nisl. Donec quis turpis mauris.</p></div>
                <div className="flex justify-between">
                    <div className="card shadow-2xl ml-10 mb-10">
                        <div className="card-header"><h1 className="text-2xl text-white">Event 1</h1></div>
                        <div className="flex w-96 bg-green-50">
                            <img className="w-64 md:[clip-path:polygon(0%_0%,100%_0%,90%_100%,0%_150%)] h-72"
                                 src={Image2}/>
                            <div className="mt-4 mb-3">
                                <ul className={'flex flex-col pr-10 text-center '}>
                                    <li><img src={locationIcon}/></li>
                                    <li>Den Haag</li>
                                    <li className=' mt-5'><img className="w-6 h-6" src={dateIcon}/></li>
                                    <li>12-01-2024</li>
                                    <li className='mt-5'><img className={'w-6 h-6'} src={timeIcon}/></li>
                                    <li className={'mr-10 mr-20'}>12:00</li>
                                    <li className='mt-5'><img className={'w-8 h-8'} src={personIcon}/></li>
                                    <li className={'mr-10 mr-20'}>25</li>
                                </ul>
                            </div>
                        </div>
                        <table className='w-full mt-3'>
                            <tr>
                                <th>Categorie</th>
                                <th>Inschrijvingen</th>
                                <th>Beoordeling</th>
                            </tr>
                            <tr>
                                <td>Vrijwilligerswerk</td>
                                <td>8</td>
                                <td>7</td>
                            </tr>
                        </table>
                        <div className="flex pb-5 p-5 mt-3 justify-around">
                            <button><img src={bookmarkIcon}/></button>
                            <button>Toevoegen aan Agenda</button>
                            <button className='bg-green-700'><h2>Inschrijven</h2></button>
                        </div>
                    </div>
                    <div className="form-card shadow-2xl pr-32 pt-5 pl-32 w-80 text-center mb-10 ">
                        <h2 className={"text-2xl"}>Inschrijf formulier</h2>
                      <form>
                          <label>
                              Name:
                          </label>
                      </form>
                    </div>
                </div>
                <div></div>
                <div className="col-span-2 ml-5 mb-10">
                    <div className="card shadow-2xl ml-0 mb-10">
                        <div className="card-header"><h1 className="text-2xl text-white">Event 2</h1></div>
                        <div className="flex bg-green-50">
                            <img className="w-80 md:[clip-path:polygon(0%_0%,100%_0%,90%_100%,0%_150%)] h-72"
                                 src={Image2}/>
                            <div className="mt-4 mb-3 ml-4">
                                <ul className={'flex flex-col text-center '}>
                                    <li><img src={locationIcon}/></li>
                                    <li>Den Haag</li>
                                    <li className=' mt-5'><img className="w-6 h-6" src={dateIcon}/></li>
                                    <li>12-01-2024</li>
                                    <li className='mt-5'><img className={'w-6 h-6'} src={timeIcon}/></li>
                                    <li className={'mr-10 mr-20'}>12:00</li>
                                    <li className='mt-5'><img className={'w-8 h-8'} src={personIcon}/></li>
                                    <li className={'mr-10 mr-20'}>25</li>
                                </ul>
                            </div>
                        </div>
                        <table className='w-full mt-3'>
                            <tr>
                                <th>Categorie</th>
                                <th>Inschrijvingen</th>
                                <th>Beoordeling</th>
                            </tr>
                            <tr>
                                <td>Vrijwilligerswerk</td>
                                <td>8</td>
                                <td>7</td>
                            </tr>
                        </table>
                        <div className="flex pb-5 p-5 mt-3 justify-between">
                            <button><img src={bookmarkIcon}/></button>
                            <button>Toevoegen aan Agenda</button>
                            <button className='bg-green-700'><h2>Inschrijven</h2></button>
                        </div>
                    </div>
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
                    <div className="card shadow-2xl ml-10 mb-10">
                        <div className="card-header"><h1 className="text-2xl text-white">Event 3</h1></div>
                        <div className="flex bg-green-50">
                            <img className="w-80 md:[clip-path:polygon(0%_0%,100%_0%,90%_100%,0%_150%)] h-72"
                                 src={Image2}/>
                            <div className="mt-4 mb-3 ml-4">
                                <ul className={'flex flex-col text-center '}>
                                    <li><img src={locationIcon}/></li>
                                    <li>Den Haag</li>
                                    <li className=' mt-5'><img className="w-6 h-6" src={dateIcon}/></li>
                                    <li>12-01-2024</li>
                                    <li className='mt-5'><img className={'w-6 h-6'} src={timeIcon}/></li>
                                    <li className={'mr-10 mr-20'}>12:00</li>
                                    <li className='mt-5'><img className={'w-8 h-8'} src={personIcon}/></li>
                                    <li className={'mr-10 mr-20'}>25</li>
                                </ul>
                            </div>
                        </div>
                        <table className='w-full mt-3'>
                            <tr>
                                <th>Categorie</th>
                                <th>Inschrijvingen</th>
                                <th>Beoordeling</th>
                            </tr>
                            <tr>
                                <td>Vrijwilligerswerk</td>
                                <td>8</td>
                                <td>7</td>
                            </tr>
                        </table>
                        <div className="flex pb-5 p-5 mt-3 justify-between">
                            <button><img src={bookmarkIcon}/></button>
                            <button>Toevoegen aan Agenda</button>
                            <button className='bg-green-700'><h2>Inschrijven</h2></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    )
}

export default EventPage;