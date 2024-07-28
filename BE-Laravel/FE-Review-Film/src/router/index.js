import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/views/Home.vue';
import Film from '@/views/Film.vue';
import Genre from '@/components/Genre.vue';
import Cast from '@/views/Cast.vue';
import Profile from '@/views/Profile.vue';
import UpdateUser from '@/views/UpdateUser.vue';
import Login from '@/views/Login.vue';
import Register from '@/views/Register.vue';
import VerifyAccount from '@/views/VerifyAccount.vue';
import store from '@/store';
import GenreList from '@/components/Genre.vue';
import ManageGenres from '@/components/ManageGenre.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/film',
    name: 'Film',
    component: Film,
  },
  {
    path: '/genre',
    name: 'Genre',
    component: GenreList,
  },
  {
    path: '/manage-genres',
    name: 'ManageGenres',
    component: ManageGenres,
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
    meta: { requiresAuth: true },
  },
  {
    path: '/update-user',
    name: 'UpdateUser',
    component: UpdateUser,
    meta: { requiresAuth: true },
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
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!store.getters.isAuthenticated) {
      next({
        path: '/login',
        query: { redirect: to.fullPath },
      });
    } else {
      next();
    }
  } else {
    next();
  }
});

export default router;
