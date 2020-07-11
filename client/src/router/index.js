import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/containers/Index'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'index',
      component: Index
    },
    {
      path: '/events/date/:year/:month?/:day?',
      name: 'events',
      component: Index
    },
  ]
})
