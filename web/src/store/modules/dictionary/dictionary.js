export default {
  namespaced: true,
  state: {
    loading: false
  },
  getters: {
    loading (state) {
      return state.loading
    }
  },
  mutations: {
    toggleLoading (state, payload) {
      state.loading = payload
    }
  },
  actions: {}
}
