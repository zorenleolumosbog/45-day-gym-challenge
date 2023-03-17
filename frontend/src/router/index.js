import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/TheMain.vue')
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/TheRegister.vue')
    },
    {
      path: '/gender',
      name: 'gender',
      component: () => import('../views/TheGender.vue')
    },
    {
      path: '/personal-information',
      name: 'personal-information',
      component: () => import('../views/ThePersonalInformation.vue')
    },
    {
      path: '/gym-experience',
      name: 'gym-experience',
      component: () => import('../views/TheGymExperience.vue')
    },
    {
      path: '/hours-sleep',
      name: 'hours-sleep',
      component: () => import('../views/TheHoursSleep.vue')
    },
    {
      path: '/stress-level',
      name: 'stress-level',
      component: () => import('../views/TheStressLevel.vue')
    },
    {
      path: '/medical-information',
      name: 'medical-information',
      component: () => import('../views/TheMedicalInformation.vue')
    }
  ]
})

export default router
