const state = {
  credentials: {
    accessToken: '',
    timeExpirationToken: '',
    auth: false,
    user_id: '',
    full_name: ''
  },
}
const mutations = {
  addAccessToken(state, payload) {
    state.credentials = {
      accessToken: payload.accessToken,
      timeExpirationToken: payload.timeExpirationToken,
      auth: payload.auth,
      user_id: payload.user_id,
      full_name: payload.full_name
    }
  }
}
const actions = {
  addAccessToken({
    commit
  }, credentials) {
    let payload = {
      accessToken: credentials.accessToken,
      timeExpirationToken: credentials.timeExpirationToken,
      auth: credentials.auth,
      user_id: credentials.user_id,
      full_name: credentials.full_name
    };
    commit('addAccessToken', payload)
  }
}
const getters = {
  credentials: (state) => {
    return state.credentials
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions,
  getters
}
