import styled from 'styled-components';
import colors from '../../colors'

export const SidebarDiv = styled.div`
  width: 100%;
  height: 100%;
  background-color: ${colors.light};
  position: relative;
  margin-left: ${props => props.visible ? '0px' : '-100%' };
  transition: margin-left 0.3s ease-in-out;
  
  @media only screen and (min-width: 768px){
    width: 150px;
    margin-left: ${props => props.visible ? '0px' : '-150px'};
  }
`;
export const SidebarToggleDiv = styled.div`
  width: 50px;
  margin-left: ${props => props.visible ? `${document.body.clientWidth - 50}px` : '100%' };
  background-image: url(https://cdn3.iconfinder.com/data/icons/vote/16/medal_rank_premium-512.png);
  background-size: cover;
  margin-top: 2px;
  height: 50px;
  transition: margin-left 0.3s ease-in-out;
  
  @media only screen and (min-width: 768px){
    margin-left: ${props => props.visible ? '100px' : '150px'};
  }
`;