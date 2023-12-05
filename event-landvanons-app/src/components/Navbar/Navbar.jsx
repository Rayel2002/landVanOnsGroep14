import React from "react";
import Logo from '../../assets/lvo-logo.png'
import MenuIcon from '../../assets/menu.png'


function Navbar() {
    return (
        <nav className="h-28 w-full flex items-center bg-green-600 p-6">
            <div className="flex items-center flex-shrink-0 text-white mr-6">
            </div>
            <span className="text-2xl text-white"><a href='/'>Land van ons</a></span>
            <div className=" flex-grow lg:flex ">
                <div className="text-xl mr-60 pr-28 ml-20">
                    <a href="/events" className="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        Events
                    </a>
                    <a href="#responsive-header" className="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        About us
                    </a>
                    <a href="#responsive-header" className="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
                        Contact
                    </a>
                </div>

            </div>
        </nav>
    )
}

export default Navbar