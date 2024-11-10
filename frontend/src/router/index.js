import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import MyBookingView from '../views/MyBookingView.vue'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/mybooking',
      name: 'mybooking',
      component: MyBookingView
    },
    {
      path: '/auth/login',
      name: 'login',
      component: LoginView,
    },
    {
      path: '/auth/register',
      name: 'register',
      component: RegisterView,
    },
  ]
})
router.beforeEach(async (to) => {
  if (localStorage.getItem('token') && to.path.startsWith('/auth')) {
    return { name: 'home' }
  }
  if (!localStorage.getItem('token') && !to.path.startsWith('/auth') && to.path !== '/') {
    return { name: 'login' }
  }
})

export default router
