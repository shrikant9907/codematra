// React Router Version 6 Example.
import React from 'react';
import { 
  BrowserRouter as Router, 
  Routes, 
  Route, 
  Link 
} from "react-router-dom";
import HomePage from "./components/pages/HomePage";
import AboutPage from "./components/pages/AboutPage";
import ContactPage from "./components/pages/ContactPage";

function App() { 
  return (
    <Router>

      <nav className="navui1">
        <ul>
          <li><Link to='/'>Home</Link></li>
          <li><Link to='/about'>About Us</Link></li>
          <li><Link to='/contact'>Contact Us</Link></li>
        </ul>
      </nav>

      <div className="pagewr">
        <Routes>
          <Route exact path="/" element={ <HomePage /> } />
          <Route path="/about" element={ <AboutPage /> } />
          <Route path="/contact" element={ <ContactPage /> }/>
        </Routes>
      </div>

    </Router>
  );
}

export default App;
