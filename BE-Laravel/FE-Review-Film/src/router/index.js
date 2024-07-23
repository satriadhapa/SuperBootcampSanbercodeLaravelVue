import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/views/Home.vue';
import Login from '@/views/Login.vue';
import Register from '@/views/Register.vue';
import VerifyAccount from '@/views/VerifyAccount.vue';
import Film from '@/views/Film.vue';
import Genre from '@/views/Genre.vue';
import Cast from '@/views/Cast.vue';
import Profile from '@/views/Profile.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
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
  },
  {
    path: '/genre',
    name: 'Genre',
    component: Genre,
  },
  {
    path: '/cast',
    name: 'Cast',
    component: Cast,
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile,
  },
];

const router = createRouter({
  history: createWebHistory(),//process.env.BASE_URL
  routes,
});

export default router;
