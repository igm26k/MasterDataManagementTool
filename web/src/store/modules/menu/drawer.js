export default {
  namespaced: true,
  state: {
    loading: false,
    drawer: true
  },
  getters: {
    loading (state) {
      return state.loading
    },
    drawer (state) {
      return state.drawer
    }
  },
  mutations: {
    toggleDrawer (state) {
      state.drawer = !state.drawer
    }
  },
  actions: {
    /**
     * Изменение состояния drawer.
     * @param commit
     */
    toggleDrawer ({ commit }) {
      commit('toggleDrawer')
    }
  }
}
