import React, {Component} from 'react';
import { Link } from 'react-router-dom';

export default class BsNavBar extends Component{
  render (){
    return (
    <nav className="navbar navbar-expand-lg navbar-light bg-light">
      <div className="navbar-header">
        <a className="navbar-brand">Brand</a>
      </div>
      <ul className="navbar-nav ml-auto">
        <li><Link to={'/'} className="nav-link"> Home </Link></li>
        <li><Link to={'/contact'} className="nav-link">Contact</Link></li>
        <li><Link to={'/about'} className="nav-link">About</Link></li>
        <li><Link to={'/admin'} className="nav-link">admin</Link></li>
      </ul>
    </nav>)
  }
}
