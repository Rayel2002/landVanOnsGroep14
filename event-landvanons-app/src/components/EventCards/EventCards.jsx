import React, {useEffect, useState} from "react";
import Image2 from "../../assets/header-image3.jpg";
import locationIcon from "../../assets/locatie.png";
import dateIcon from "../../assets/date_icon.png";
import timeIcon from "../../assets/time_icon.png";
import personIcon from "../../assets/icons8-person-48.png";
import bookmarkIcon from "../../assets/bookmark.png";
import NextButton from '../../assets/next-button.png';
import PreviousButton from '../../assets/previous-button.png';

function EventCards({data}) {
    // console.log("here:", data);
    const [index, setIndex] = useState(0);
    const [showModal, setShowModal] = useState(false)

    const showMessage = () => {

    }

    return (
        <>
            <div className="flex justify-between ">
                <div className="card shadow-2xl ml-10 mb-10">
                    <div className="card-header"><h1 className="text-2xl text-white">{data.eventName}</h1></div>
                    <div className="flex w-96 bg-green-50">
                        <img className="w-64 md:[clip-path:polygon(0%_0%,100%_0%,90%_100%,0%_150%)] h-72"
                             src={Image2}/>
                        <div className="mt-4 mb-3">
                            <ul className={'flex flex-col pr-10 text-center '}>
                                <li><img src={locationIcon}/></li>
                                <li>{data.streetName}</li>
                                <li className=' mt-5'><img className="w-6 h-6" src={dateIcon}/></li>
                                <li>{data.beginTime}</li>
                                <li className='mt-5'><img className={'w-6 h-6'} src={timeIcon}/></li>
                                <li className={'mr-10 mr-20'}>12:00</li>
                                <li className='mt-5'><img className={'w-8 h-8'} src={personIcon}/></li>
                                <li className={'mr-10 mr-20'}>25</li>
                            </ul>
                        </div>
                    </div>
                    <div className="flex pb-5 p-5 mt-3 justify-around">
                        <button><img src={bookmarkIcon}/></button>
                        <button onClick={() => setShowModal(true)} className='bg-green-700 text-white'><h2>Inschrijven</h2></button>
                        {showModal ? (
                            <>
                                <div className="flex justify-center items-center overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none">
                                    <div className="relative w-auto my-6 mx-auto max-w-3xl">
                                        <div className="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                            <div className="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t ">
                                                <h3 className="text-3xl font=semibold">General Info</h3>
                                                <button
                                                    className="bg-transparent border-0 text-black float-right"
                                                    onClick={() => setShowModal(false)}
                                                >
                    <span className="text-black opacity-7 h-6 w-6 text-xl block bg-gray-400 py-0 rounded-full">
                      x
                    </span>
                                                </button>
                                            </div>
                                            <div className="relative p-6 flex-auto">
                                                <form className="bg-gray-200 shadow-md rounded px-8 pt-6 pb-8 w-full">
                                                    <label className="block text-black text-sm font-bold mb-1">
                                                        First Name
                                                    </label>
                                                    <input className="shadow appearance-none border rounded w-full py-2 px-1 text-black" />
                                                    <label className="block text-black text-sm font-bold mb-1">
                                                        Last Name
                                                    </label>
                                                    <input className="shadow appearance-none border rounded w-full py-2 px-1 text-black" />
                                                    <label className="block text-black text-sm font-bold mb-1">
                                                        Address
                                                    </label>
                                                    <input className="shadow appearance-none border rounded w-full py-2 px-1 text-black" />
                                                    <label className="block text-black text-sm font-bold mb-1">
                                                        City
                                                    </label>
                                                    <input className="shadow appearance-none border rounded w-full py-2 px-1 text-black" />
                                                </form>
                                            </div>
                                            <div className="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                                                <button
                                                    className="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1"
                                                    type="button"
                                                    onClick={() => setShowModal(false)}
                                                >
                                                    Close
                                                </button>
                                                <button
                                                    className="text-white bg-yellow-500 active:bg-yellow-700 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                                    type="button"
                                                    onClick={() => setShowModal(false)}
                                                >
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </>
                        ) : null}
                    </div>
                </div>
                <div className="detail-card w-40 shadow-2xl text-center mb-10 ">
                        <div key={1}>
                            <h2 className={"text-2xl mt-5 pb-5"}>Details</h2>
                            <h3 className="text-xl pb-3">Omschrijving:</h3>
                            <div className={"description-section"}>
                                <p className={"description"}>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Vestibulum vestibulum dapibus dui eu
                                    maximus. Maecenas sed massa vehicula, tristique sapien vel, egestas tellus. Cras
                                    vulputate et
                                    neque ut blandit. Fusce suscipit ex felis, quis dapibus nulla vehicula eget. Vivamus
                                    iaculis
                                    sapien massa, at gravida lacus tempor et. Phasellus luctus justo eget augue bibendum
                                    interdum.
                                    Sed accumsan commodo sem, sed posuere lectus bibendum a. Donec nec laoreet purus.
                                    Vestibulum
                                    condimentum malesuada orci, in efficitur orci accumsan sed. Donec a maximus neque,
                                    in interdum
                                    nisl. Donec quis turpis mauris.</p>
                            </div>
                        </div>
                    <div className={"button-section mt-3 flex justify-around"}>
                        {/*<button className={"previous-button"}><img src={PreviousButton}/></button>*/}
                        {/*<button onClick={showNext} className={"next-button"}><img src={NextButton}/></button>*/}
                    </div>
                    <button className={'close-button mt-5 ml-auto left-32'}></button>
                </div>
            </div>
        </>
    )
}

export default EventCards;