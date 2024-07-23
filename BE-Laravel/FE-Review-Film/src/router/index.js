import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/views/HomePage.vue';
import Login from '@/views/Login.vue';
import Register from '@/views/Register.vue';
import VerifyAccount from '@/views/VerifyAccount.vue';
import Film from '@/views/Film.vue';
import Genre from '@/views/Genre.vue';
// import Cast from './views/Cast.vue';
import Profile from '@/views/Profile.vue';
import UpdateUser from '@/views/UpdateUser.vue';

const routes = [
  { path: '/', name: 'HomePage', component: Home },
  { path: '/login', component: Login, meta: { hideNavbar: true } },
  { path: '/register', component: Register, meta: { hideNavbar: true } },
  { path: '/verify-account', component: VerifyAccount, meta: { hideNavbar: true } },
  { path: '/film', name: 'Film', component: Film },
  { path: '/genre', name: 'Genre', component: Genre },
  { path: '/profile', component: Profile },
  { path: '/update-user', component: UpdateUser },
  
  
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;


// { path: '/login', name: 'Login', component: Login },
//   { path: '/register', name: 'Register', component: Register },
//   
//   
//   
//   { path: '/cast', name: 'Cast', component: Cast }