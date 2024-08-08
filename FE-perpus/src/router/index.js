import { createRouter, createWebHistory } from 'vue-router';
import Register from '@/components/Register.vue';
import Login from '@/components/Login.vue';
import Home from '@/components/Home.vue';
import Profile from '@/components/Profile.vue'; 
import ProfileDisplay from '@/components/ProfileDisplay.vue'; 
import Book from '@/components/Book.vue'; // Import Book component

const routes = [
  { path: '/register', component: Register },
  { path: '/login', component: Login },
  { path: '/', component: Home, meta: { requiresAuth: false } },
  { path: '/profile', component: Profile, meta: { requiresAuth: true } },
  { path: '/profile-display', component: ProfileDisplay, meta: { requiresAuth: true } }, 
  { path: '/books', component: Book, meta: { requiresAuth: false } }, // Add route for books
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
  const token = localStorage.getItem('token');

  if (requiresAuth && !token) {
    next('/login');
  } else {
    next();
  }
});

export default router;
