<script setup>
import { ref, computed, watchEffect } from 'vue';
import { useRouter } from 'vue-router';
import Footer from './components/Footer.vue';

const router = useRouter();
const isLoggedIn = ref(!!localStorage.getItem('token'));
const userRole = ref(localStorage.getItem('role')); 
const isSidebarOpen = ref(false);
const isLoading = ref(false); 

const logout = () => {
  localStorage.removeItem('token');
  localStorage.removeItem('role'); // Menghapus role saat logout
  isLoggedIn.value = false;
  userRole.value = null; // Reset userRole saat logout
  router.push('/login');
};

watchEffect(() => {
  isLoggedIn.value = !!localStorage.getItem('token');
  userRole.value = localStorage.getItem('role'); // Update userRole saat terjadi perubahan
});

// Function to toggle sidebar visibility
const toggleSidebar = () => {
  isSidebarOpen.value = !isSidebarOpen.value;
};

// Example loading
const loadData = async () => {
  isLoading.value = true;
  try {
    await new Promise(resolve => setTimeout(resolve, 2000)); // Simulasi loading for 2 seconds
  } finally {
    isLoading.value = false;
  }
};

loadData();
</script>

<template>
  <header class="bg-blue-500 text-white p-4 flex justify-between items-center">
    <router-link to="/" class="text-2xl font-bold">Perpustakaan</router-link>
    <button class="lg:hidden bg-blue-700 px-3 py-2 rounded" @click="toggleSidebar">
      ☰
    </button>
  </header>

  <div class="flex">
    <!-- Sidebar -->
    <aside :class="{'hidden': !isSidebarOpen, 'lg:block': true}" class="lg:w-64 bg-blue-500 text-white p-4 space-y-4 h-screen lg:h">
      <nav>
        <router-link to="/" class="block mb-4">Home</router-link>
        <router-link to="/books" class="block mb-4">Daftar Buku</router-link>
        <router-link to="/categories" class="block mb-4">Daftar Kategori</router-link>

        <!-- Tampilkan Navbar Role hanya jika userRole adalah 'owner' -->
        <router-link v-if="userRole === 'owner'" to="/roles" class="block mb-4">Manage Roles</router-link>

        <router-link to="/profile-display" v-if="isLoggedIn" class="block mb-4">Detail Profile</router-link>
        <router-link to="/profile" v-if="isLoggedIn" class="block mb-4">Update Profile</router-link>
        <router-link to="/login" v-if="!isLoggedIn" class="block mb-4">Login</router-link>
        <router-link to="/register" v-if="!isLoggedIn" class="block mb-4">Register</router-link>
        <button v-if="isLoggedIn" @click="logout" class="bg-red-500 px-3 py-1 rounded">Logout</button>
      </nav>
    </aside>

    <main class="flex-1 container mx-auto p-4">
      <!-- Loading Spinner -->
      <div v-if="isLoading" class="loading-spinner">
        Loading...
      </div>
      <!-- Transisi saat berpindah halaman -->
      <transition name="fade" mode="out-in">
        <router-view v-show="!isLoading" />
      </transition>
    </main>
  </div>

  <Footer />
</template>

<style scoped>
header {
  background-color: #1d4ed8;
  color: white;
  padding: 1rem;
}

button {
  background-color: #1d4ed8;
  color: white;
}

nav a {
  color: white;
  text-decoration: none;
}

nav a:hover {
  text-decoration: underline;
}

button:hover {
  background-color: #000000;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from, .fade-leave-to {
  opacity: 0;
}

.loading-spinner {
  text-align: center;
  font-size: 1.5rem;
  color: #1d4ed8;
  margin-top: 2rem;
}
</style>
