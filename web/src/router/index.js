import Vue from 'vue'
import VueRouter from 'vue-router'
import SimpleDictionary from '@/pages/dictionary/SimpleDictionary'

Vue.use(VueRouter)

const routes = [
  {
    path: '/:name',
    name: 'simpleDictionary',
    component: SimpleDictionary,
    props: true
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router
