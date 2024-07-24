import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/views/Home.vue';
import Login from '@/views/Login.vue';
import Register from '@/views/Register.vue';
import VerifyAccount from '@/views/VerifyAccount.vue';
import Film from '@/views/Film.vue';
import Genre from '@/views/Genre.vue';
import Cast from '@/views/Cast.vue';
import Profile from '@/views/Profile.vue';
import UpdateUser from '@/views/UpdateUser.vue';
import store from '@/store';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: { requiresAuth: true, requiresVerification: true },
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
  },
  {
    path: '/register',
    name: 'Register',
    component: Register,
  },
  {
    path: '/verify-account',
    name: 'VerifyAccount',
    component: VerifyAccount,
  },
  {
    path: '/film',
    name: 'Film',
    component: Film,
    meta: { requiresAuth: true, requiresVerification: true },
  },
  {
    path: '/genre',
    name: 'Genre',
    component: Genre,
    meta: { requiresAuth: true, requiresVerification: true },
  },
  {
    path: '/cast',
    name: 'Cast',
    component: Cast,
    meta: { requiresAuth: true, requiresVerification: true },
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile,
    meta: { requiresAuth: true, requiresVerification: true },
  },
  {
    path: '/update-user',
    name: 'UpdateUser',
    component: UpdateUser,
    meta: { requiresAuth: true, requiresVerification: true },
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  const isAuthenticated = store.getters.isAuthenticated;
  const user = store.getters.user;

  if (to.matched.some(record => record.meta.requiresAuth) && !isAuthenticated) {
    next({ name: 'Login' });
  } else if (to.matched.some(record => record.meta.requiresVerification) && (!user || !user.email_verified_at)) {
    next({ name: 'VerifyAccount' });
  } else {
    next();
  }
});

export default router;
