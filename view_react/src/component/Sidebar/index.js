import React, {Component} from 'react';
import {SidebarDiv, SidebarToggleDiv} from './styles.js';

class Sidebar extends Component {
  constructor(props){
    super(props);
    this.state = {visible: false};
  }
  toggleVisibility = (e) => {
    this.setState({visible: this.state.visible ? false : true});
  }
  render(){
    return(
      <SidebarDiv {...this.state}>
        <SidebarToggleDiv {...this.state} onClick={this.toggleVisibility} />
      </SidebarDiv>
    );
  }
}

export default Sidebar;