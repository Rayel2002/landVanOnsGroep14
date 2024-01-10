import React, {useState} from "react";

function Register() {

    const [name, setName] = useState('')
    const [email, setEmail] = useState('')
    const [password, setPassword] = useState('')

    const handleSubmit = (e) => {
        e.preventDefault();

        // Access the form values from state
        console.log('Name:', name);

        // Add additional logic (e.g., sending data to a server, updating state, etc.)
    };
    //
    // const createAccount = async () => {
    //     const response = fetch('http://127.0.0.1:8000/register', {
    //         headers: {
    //             'accept': 'application/json',
    //             'Content-Type': 'application/json',
    //             "X-CSRF-Token": document.querySelector('input[name=_token]').value
    //         },
    //         method: 'POST',
    //         body: JSON.stringify( {
    //             name: name,
    //             email: email,
    //             password: password
    //         })
    //     })
    //         .then(response => response.json())
    //         .then(data => {
    //             console.log(data)
    //         }).catch((error) => (console.log(error)))
    // }

    const [showModal, setShowModal] = useState(false)


    return (
        <>
            <h1 className={"font-bold text-center text-2xl"}>Registreren</h1>
            <form onSubmit={handleSubmit} className={"flex mt-10  justify-center"}>
                <div className={"mx-auto flex flex-col"}>
                    <span className={"flex pr-5 flex-row"}>
                    <label className={"font-semibold"}>Naam:</label>
                <input value={name} onChange={(e)=> setName(e.target.value)} type={"text"} className={"border-grey-50 ml-5 mb-10 w-52 border-2 rounded"}/>
                        </span>
                    <span className={"flex flex-row"}>
                    <label className={"font-semibold"}>Email:</label>
                    <input value={email} onChange={(e)=> setEmail(e.target.value)} type={"text"} className={"border-grey-50 ml-5 mb-10 w-52 border-2 rounded"}/>
                           </span>
                    <span className={"flex flex-"}>
                    <label className={"font-semibold"}>Wachtwoord:</label>
                    <input value={password} onChange={(e) => setPassword(e.target.value)} type={"password"} className={"border-grey-50 ml-5 mb-10 w-52 border-2 rounded"}/>
                           </span>
                    <span className={"flex flex-row"}>
                    <label className={"font-semibold"}>Wachtwoord bevestigen:</label>
                    <input type={"password"} className={"border-grey-50 ml-5 mb-10 w-52 border-2 rounded"}/>
                           </span>
                    <input className={"register-button"} onClick={() => setShowModal(true)} type={"submit"} value={"Registreren"}/>
                    {showModal ? (
                        <>
                            <div className="flex justify-center items-center overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none">
                                <div className="relative w-auto my-6 mx-auto max-w-3xl">
                                    <div className="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                        <div className="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t ">
                                            <h3 className="text-3xl font=semibold">Registratie gelukt</h3>
                                        </div>
                                        <div className="relative p-6 flex-auto">
                                            <div className={"description-section"}>
                                                <p> <p>Het aanmaken van een account bij Land van ons is succesvol gelukt</p></p>
                                            </div>
                                        </div>
                                        <div className="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                                            <button
                                                className="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1"
                                                type="button"
                                                onClick={() => setShowModal(false)}
                                            >
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </>
                    ) : null}
                </div>
            </form>
        </>
    )
}
export default Register;