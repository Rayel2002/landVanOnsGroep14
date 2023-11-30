import React from "react";
import Logo from "../../assets/lvo-logo.png";
import HeaderImage from '../../assets/header-image.jpg';

function Header() {
    return (
        <div className="">
            <header className=" h-96  md:[clip-path:polygon(0%_0%,100%_0%,120%_90%,0%_50%)]" >
            <img src={HeaderImage} className=" w-full "/>
            </header>
        </div>
    )
}

export default Header
