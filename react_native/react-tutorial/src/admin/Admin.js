import React, {Component} from 'react';
import { Route } from 'react-router-dom';

export default class Admin extends Component{
  constructor(props){
    super(props);
    console.log(Route);
    this.state = {
      err : null,
      isLoaded: false,
      list: []
    }
  }
  componentDidMount(){
      fetch('https://jsistudentportal.000webhostapp.com/api/user/get/')
      .then((res) => res.json())
      .then((res) => {
        console.log(res);
        this.setState({isLoaded: true, list: res.data});
        return res;
      },(err) => {
        console.log(err);
        this.setState({ isLoaded: true, err});
        return err;
      });
  }
  render (){
    const {err , isLoaded, list} = this.state;
    if (!isLoaded) {
      return <div>Loading....</div>;
    } else if (err) {
      return <div>{this.state.err}</div>;
    } else {
      return (<div className="container-fluid">
        Admin
        {list.map((item) => {
          return <div key={item.userId}>{item.email}</div>
        })}
      </div>)
    }
  }
}
