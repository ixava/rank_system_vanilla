import fetch from 'isomorphic-fetch';

export const READ = 'READ';
export const WRITE = 'WRITE';
export const UPDATE = 'UPDATE';
export const DELETE = 'DELETE';

export const RECEIVE = 'RECEIVE';

export const API_URL = `https://ranksystem-react-skeeze.c9users.io/crud.php?`;
export const objToParamURL = (sourceObj) => {
  return Array.from(sourceObj, (item, key) => `${key}=${item}`).join('&');
}

export const getAPI = (target, args) => {
  var link = API_URL + `data_target=${target}&custom_method=read&args=${JSON.stringify({args: args})}`;
  return dispatch => {
    return fetch(link)
      .then(response => response.json())
        .then(json => dispatch(receive(json.data, target))
    );
  }
}

export const receive = (payload, dataTarget) => {
  return {
      type: 'RECEIVE',
      dataTarget,
      data: Array.from(payload)
  }
}
