import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import store from './store'; // Pastikan store diimpor

createApp(App)
  .use(router)
  .use(store) // Pastikan store digunakan
  .mount('#app');
