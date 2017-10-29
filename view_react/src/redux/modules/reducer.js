import {combineReducers} from 'redux';
import userReducer from './user';
import api from './api';
import {routerReducer} from 'react-router-redux'

const reducer = combineReducers({userReducer, api, router: routerReducer});

export default reducer; 