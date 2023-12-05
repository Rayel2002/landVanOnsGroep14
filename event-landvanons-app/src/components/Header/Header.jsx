import React from "react";
import Logo from "../../assets/lvo-logo.png";
import HeaderImage from '../../assets/header-image.jpg';
import LandVanOnsHeader from '../../assets/landvanons-header.jpg';
import HeaderImage3 from '../../assets/header-image3.jpg';
function Header() {
    return (
        <div>
            <header className=" h-96 md:[clip-path:polygon(0%_0%,100%_0%,120%_90%,0%_50%)]" >
            <img src={HeaderImage} className=" w-full "/>
                 <div className="mb-60"><image src={HeaderImage3}/></div>
            </header>
        </div>
    )
}

export default Header
