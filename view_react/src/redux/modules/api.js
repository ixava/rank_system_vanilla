
const api = (state={user: [], rank: [], role: [], week: [], department: []}, action) => {
    
    switch (action.type) {
      case 'RECEIVE':
        return {
          ...state, 
          [action.dataTarget]: [...state[action.dataTarget],...action.data]
          };
      default:
        return state;
    }
}

export default api;