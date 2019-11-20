import React, { Component } from 'react';
import { BrowserRouter as Router, Route} from 'react-router-dom';
import Home from './Home';
import About from './About';
import Contact from './Contact';
import Admin from './admin/Admin';
import BsNavBar from './shared/BsNavBar';

class App extends Component {
  render() {
    return (
    <Router>
        <div>
          <BsNavBar link={this} c={Home} />
          <hr />
          <Route>
              <Route exact path='/' component={Home} />
              <Route path='/contact' component={Contact} />
              <Route path='/about' component={About} />
              <Route path='/admin' component={Admin} />
          </Route>
        </div>
      </Router>
    );
  }
}

export default App;
