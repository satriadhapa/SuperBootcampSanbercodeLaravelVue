<script setup>
import { computed } from 'vue';
import { useRouter } from 'vue-router';
import Footer from './components/Footer.vue';

const router = useRouter();

const isLoggedIn = computed(() => !!localStorage.getItem('token'));

const logout = () => {
  localStorage.removeItem('token');
  router.push('/login');
};
</script>

<template>
  <header class="bg-blue-500 text-white p-4">
    <nav class="container mx-auto flex justify-between items-center">
      <div>
        <router-link to="/" class="text-2xl font-bold">Perpustakaan</router-link>
      </div>
      <div>
        <router-link to="/" class="mr-4">Home</router-link>
        <router-link to="/books" class="mr-4">Books</router-link>
        <router-link to="/profile-display" v-if="isLoggedIn" class="mr-4">detail Profile</router-link>
        <router-link to="/profile" v-if="isLoggedIn" class="mr-4">Update Profile</router-link>
        <router-link to="/login" v-if="!isLoggedIn" class="mr-4">Login</router-link>
        <router-link to="/register" v-if="!isLoggedIn" class="mr-4">Register</router-link>
        <button v-if="isLoggedIn" @click="logout" class="bg-red-500 px-3 py-1 rounded">Logout</button>
      </div>
    </nav>
  </header>
  <main class="container mx-auto p-4">
    <router-view />
  </main>
  <Footer />
</template>

<style scoped>
header {
  background-color: #1d4ed8;
  color: white;
  padding: 1rem;
}

nav a {
  color: white;
  margin-right: 1rem;
  text-decoration: none;
}

nav a:hover {
  text-decoration: underline;
}

button {
  background-color: #ef4444;
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 0.25rem;
  color: white;
  cursor: pointer;
}

button:hover {
  background-color: #000000;
}
</style>
