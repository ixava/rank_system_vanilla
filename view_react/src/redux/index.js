import {createStore, applyMiddleware} from 'redux';
import {routerMiddleware} from 'react-router-redux';
import reducer from './modules/reducer';
import createHistory from 'history/createBrowserHistory';
import thunk from 'redux-thunk';

export const history = createHistory();
const reduxRouterMiddleware = routerMiddleware(history);

export const store = createStore(reducer, applyMiddleware(reduxRouterMiddleware, thunk));

export default store;