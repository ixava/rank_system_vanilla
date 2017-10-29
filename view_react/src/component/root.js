import React, {Component} from 'react';
import {Route} from 'react-router';
import {ConnectedRouter} from 'react-router-redux';
import {Provider} from 'react-redux';

import {history} from '../redux';
import store from '../redux';

import Home from '../scene/Home';
import Login from '../scene/Login';

class Root extends Component{
  componentDidMount(){
    document.body.style.margin = 0;
  }
  render(){
    return(
      <Provider store={store}>
        <ConnectedRouter history={history}>
          <div>
            <Route exact path='/' component={Home} />
            <Route path='/login' component={Login} />
          </div>
        </ConnectedRouter>
      </Provider>
    );
  }
}  
export default Root;