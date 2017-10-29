import React, {Component} from 'react';
import {connect} from 'react-redux';
import {mapDispatchToProps, mapStateToProps} from '../../container/api';
import {Viewport} from './styles';
import Sidebar from '../../component/Sidebar';

class Home extends Component {
  componentWillMount(){
    this.props.getUsers();
    this.props.getRanks();
    this.props.getDepartments();
    this.props.getRoles();
  }
  render(){
    return(
      <Viewport>
        <Sidebar>
        </Sidebar>
      </Viewport>
    )
  }
}

const apiContainer = connect(mapStateToProps, mapDispatchToProps)(Home);

export default apiContainer;