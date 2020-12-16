import Vue from 'vue'
import Vuex from 'vuex'
import drawer from './modules/menu/drawer'
import dictionary from './modules/dictionary/dictionary'

Vue.use(Vuex)

export const store = new Vuex.Store({
  strict: process.env.NODE_ENV !== 'production',
  modules: {
    drawer,
    dictionary
  }
})
