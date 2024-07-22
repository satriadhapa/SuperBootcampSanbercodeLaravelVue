import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/views/Home.vue';
import Login from '@/views/Login.vue';
import Register from '@/views/Register.vue';
import VerifyAccount from '@/views/VerifyAccount.vue';
import Film from '@/views/Film.vue';
import Genre from '@/views/Genre.vue';
// import Cast from './views/Cast.vue';

const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/login', component: Login },
  { path: '/register', name: 'Register', component: Register },
  { path: '/verify-account', name: 'VerifyAccount', component: VerifyAccount },
  { path: '/film', name: 'Film', component: Film },
  { path: '/genre', name: 'Genre', component: Genre },
  
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