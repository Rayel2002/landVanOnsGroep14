import React from "react";
import Logo from '../assets/lvo-logo.png'

function Home() {
    return (
        <div className="grid grid-cols-3 col-span-2">
            <div className="flex justify-around">
                <div className="card">
                    <div className="card-header">
                    <img className="w-24" src={Logo}/>
                    </div>
                </div>

            </div>
            <div>test</div>
            <div>test</div>
        </div>
    )
}

export default Home