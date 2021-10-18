import React from 'react';
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import DatetimePickerPage from './components/pages/DatetimePickerPage';
import './components/pages/PageStyle.scss';

function App() { 
  return (
    <Router>
      <nav className="navui1">
        <ul>
          <li><Link to='/datetimepicker'>React Date Time Picker</Link></li>
        </ul>
      </nav>
      <div className="pagewr">
        <Switch>
          <Route path="/datetimepicker" component={DatetimePickerPage}/>
        </Switch>
      </div>
    </Router>
  );
}
export default App;