import React, { useState } from 'react';
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import HomePage from "./components/pages/HomePage";
import LoginModal from './components/login-modal/LoginModal';

function App() { 
  const [showLoginModal, setShowLoginModal]     = useState(false);
  const handleShowLoginModal = () => {
    setShowLoginModal(!showLoginModal); 
  }

  return (
    <Router>
      <LoginModal show={showLoginModal} close={handleShowLoginModal} />
      <nav className="navui1">
        <ul>
          <li><Link to='/'>Home</Link></li>
          <li><button class="btnui" onClick={handleShowLoginModal}>Login</button></li>
        </ul>
      </nav>
      <div className="pagewr">
        <Switch>
          <Route exact path="/" component={HomePage} />
          <Route path="/datepicker" component={ReactDatePicker}/>
          <Route path="/datetimepicker" component={DatetimePickerPage}/>
        </Switch>
      </div>
    </Router>
  );
}
export default App;