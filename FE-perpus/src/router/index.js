import { createRouter, createWebHistory } from 'vue-router';
import Register from '@/components/Register.vue';
import Login from '@/components/Login.vue';
import Home from '@/components/Home.vue';
import Profile from '@/components/Profile.vue';
import ProfileDisplay from '@/components/ProfileDisplay.vue';
import Book from '@/components/Book.vue';
import Category from '@/components/Category.vue';
import Role from '@/components/Role.vue';
import BorrowList from '@/components/BorrowList.vue'; // Import BorrowList component

const routes = [
  { path: '/register', component: Register },
  { path: '/login', component: Login },
  { path: '/', component: Home, meta: { requiresAuth: false } },
  { path: '/profile', component: Profile, meta: { requiresAuth: true } },
  { path: '/profile-display', component: ProfileDisplay, meta: { requiresAuth: true } },
  { path: '/books', component: Book, meta: { requiresAuth: false } },
  { path: '/categories', component: Category, meta: { requiresAuth: false } },
  { path: '/roles', component: Role, meta: { requiresAuth: true, requiresOwner: true } },
  { path: '/borrows', component: BorrowList, meta: { requiresAuth: true, requiresOwner: true } }, // Add route for BorrowList
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
  const requiresOwner = to.matched.some(record => record.meta.requiresOwner);
  const token = localStorage.getItem('token');
  const userRole = localStorage.getItem('role'); // Asumsikan role disimpan di localStorage

  if (requiresAuth && !token) {
    next('/login');
  } else if (requiresOwner && userRole !== 'owner') {
    next('/');
  } else {
    next();
  }
});

export default router;
