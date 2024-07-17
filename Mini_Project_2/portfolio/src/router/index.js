import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import AboutView from '../views/AboutView.vue';
import PortfolioView from '../views/PortfolioView.vue';
import ExperienceView from '@/views/ExperienceView.vue';

const routes = [
  { path: '/', component: HomeView },
  { path: '/about', component: AboutView },
  { path: '/portfolio', component: PortfolioView },
  { path: '/experience', component: ExperienceView },

];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
