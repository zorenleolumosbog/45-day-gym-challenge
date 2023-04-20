import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      redirect: { name: 'users' },
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/TheLogin.vue')
    },
    {
      path: '/forgot-password',
      name: 'forgot-password',
      component: () => import('../views/ForgotPassword.vue')
    },
    {
      path: '/reset-password',
      name: 'reset-password',
      component: () => import('../views/ResetPassword.vue')
    },
    {
      path: '/users',
      name: 'users',
      component: () => import('../views/User/TheIndex.vue')
    },
    {
      path: '/telegram-links',
      name: 'telegram-links',
      component: () => import('../views/TelegramLink/TheIndex.vue')
    },
    {
      path: '/sidebar-links',
      name: 'sidebar-links',
      component: () => import('../views/SidebarLink/TheIndex.vue')
    },
    {
      path: '/options',
      name: 'options',
      redirect: { name: 'weekly-contest' },
      component: () => import('../views/Option/TheIndex.vue'),
      children: [
        {
          path: 'weekly-contest',
          name: 'weekly-contest',
          component: () => import('../views/Option/TheIndex.vue')
        },
        {
          path: 'weeks-description',
          name: 'weeks-description',
          component: () => import('../views/Option/TheIndex.vue')
        },
        {
          path: 'links',
          name: 'links',
          component: () => import('../views/Option/TheIndex.vue')
        },
        {
          path: 'closing-contest-email',
          name: 'closing-contest-email',
          component: () => import('../views/Option/TheIndex.vue')
        }
      ]
    }
  ]
})

export default router
