import logo from './logo.svg';
import './App.css';
import Navbar from "./components/Navbar/Navbar";
import Image from '../src/assets/background-event.jpg'
import Header from "./components/Header/Header";
import {Routes, Route} from "react-router-dom";
import Home from "./views/Home";
import EventPage from "./views/EventPage";
import Register from "./views/Register";

function App() {
  return (
    <div className="App">
       <Navbar></Navbar>
       <Header></Header>
        <Routes>
            <Route path="/" element={<Home/>}></Route>
            <Route path="/events" element={<EventPage/>}></Route>
            <Route path="/register" element={<Register
            />}></Route>
        </Routes>

    </div>
  );
}

export default App;
