import React from "react";
import Logo from '../../assets/lvo-logo.png'
import MenuIcon from '../../assets/menu.png'

interface props {
    toggleMenu: () => void;
}
function Navbar({toggleMenu}) : props {
    return (
        <nav className="h-28 w-full flex items-center bg-green-600 p-6">
            <div className="flex items-center flex-shrink-0 text-white mr-6">
            </div>
            <button onClick={toggleMenu}>
                <img src={MenuIcon}/>
            </button>
            <div className=" flex-grow lg:flex ">
                <div className="text-xl mr-60 pr-28 lg:flex-grow content-between">
                    <a href="#responsive-header" className="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        Overview
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