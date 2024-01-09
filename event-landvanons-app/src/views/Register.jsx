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

    const createAccount = async () => {
        const response = fetch('http://127.0.0.1:8000/register', {
            headers: {
                'accept': 'application/json',
                'Content-Type': 'application/json',
                "X-CSRF-Token": document.querySelector('input[name=_token]').value
            },
            method: 'POST',
            body: JSON.stringify( {
                name: name,
                email: email,
                password: password
            })
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)
            }).catch((error) => (console.log(error)))
    }

    return (
        <>
            <h1 className={"font-bold text-center text-2xl"}>Registreren</h1>
            <form onSubmit={handleSubmit} className={"flex mt-10 justify-center"}>
                <div className={"mx-auto flex flex-col"}>
                    <span className={"flex pr-5 flex-row"}>
                    <label className={"font-semibold"}>Naam:</label>
                <input value={name} onChange={(e)=> setName(e.target.value)} type={"text"} className={"border-grey-50 ml-5 mb-10 w-52 border-2 rounded"}/>
                        </span>
                    <span className={"flex flex-row"}>
                    <label className={"font-semibold"}>Email:</label>
                    <input value={email} onChange={(e)=> setEmail(e.target.value)} type={"text"} className={"border-grey-50 ml-5 mb-10 w-52 border-2 rounded"}/>
                           </span>
                    <span className={"flex flex-row"}>
                    <label className={"font-semibold"}>Wachtwoord:</label>
                    <input value={password} onChange={(e) => setPassword(e.target.value)} type={"password"} className={"border-grey-50 ml-5 mb-10 w-52 border-2 rounded"}/>
                           </span>
                    <span className={"flex flex-row"}>
                    <label className={"font-semibold"}>Wachtwoord bevestigen:</label>
                    <input type={"text"} className={"border-grey-50 ml-5 mb-10 w-52 border-2 rounded"}/>
                           </span>
                    <input onClick={createAccount} type={"submit"} value={"Verzenden"}/>
                </div>
            </form>
        </>
    )
}

export default Register;