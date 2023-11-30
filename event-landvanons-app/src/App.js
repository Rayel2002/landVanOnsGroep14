import logo from './logo.svg';
import './App.css';
import Navbar from "./components/Navbar/Navbar";
import Header from "./components/Header/Header";
import {Routes, Route} from "react-router-dom";
import Home from "./views/Home";

function App() {
  return (
    <div className="App">
       <Navbar></Navbar>
       <Header></Header>
        <Routes>
            <Route path="/" element={<Home/>}></Route>
        </Routes>

    </div>
  );
}

export default App;
