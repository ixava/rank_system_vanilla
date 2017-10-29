import {getAPI} from '../redux/modules/utils/api';


export const mapDispatchToProps = dispatch => {
  return {
    getUsers: () => dispatch(getAPI('user')),
    getRanks: () => dispatch(getAPI('rank')),
    getRoles: () => dispatch(getAPI('role')),
    getDepartments: () => dispatch(getAPI('department'))
  }
};

export const mapStateToProps = state => {
  return {ajaxData: state};
}