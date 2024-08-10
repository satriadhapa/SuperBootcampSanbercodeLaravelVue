<script setup>
import { ref, computed, watchEffect } from 'vue';
import { useRouter } from 'vue-router';
import Footer from './components/Footer.vue';

const router = useRouter();
const isLoggedIn = ref(!!localStorage.getItem('token'));
const userRole = ref(localStorage.getItem('role')); 
const isSidebarOpen = ref(false);
const isLoading = ref(false); 
const showLogoutConfirmation = ref(false);
const isLogoutSuccess = ref(false);

const logout = () => {
  showLogoutConfirmation.value = false;
  localStorage.removeItem('token');
  localStorage.removeItem('role'); // Menghapus role saat logout
  isLoggedIn.value = false;
  userRole.value = null; // Reset userRole saat logout
  isLogoutSuccess.value = true;
  setTimeout(() => {
    isLogoutSuccess.value = false;
    router.push('/login');
  }, 1500); // Tampilkan pesan sukses selama 1.5 detik sebelum redirect
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
  <header class="bg-blue-800 text-white p-4 flex justify-between items-center shadow-md">
    <router-link to="/" class="text-2xl font-bold">Perpustakaan</router-link>
    <button class="lg:hidden bg-blue-600 px-3 py-2 rounded" @click="toggleSidebar">
      ☰
    </button>
  </header>

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside :class="{'hidden': !isSidebarOpen, 'lg:block': true}" class="text-lg lg:w-64 bg-blue-800 text-white p-4 space-y-4 min-h-screen shadow-lg">
      <nav>
        <router-link to="/" class="block mb-4 hover:text-blue-400">Home</router-link>
        <router-link to="/books" class="block mb-4 hover:text-blue-400">Daftar Buku</router-link>
        <router-link to="/categories" class="block mb-4 hover:text-blue-400">Daftar Kategori</router-link>

        <!-- Tampilkan Navbar Role hanya jika userRole adalah 'owner' -->
        <router-link v-if="userRole === 'owner'" to="/roles" class="block mb-4 hover:text-blue-400">Manage Roles</router-link>
        <router-link v-if="userRole === 'owner'" to="/borrows" class="block mb-4 hover:text-blue-400">Daftar Peminjam</router-link>

        <router-link to="/profile-display" v-if="isLoggedIn" class="block mb-4 hover:text-blue-400">Detail Profile</router-link>
        <router-link to="/profile" v-if="isLoggedIn" class="block mb-4 hover:text-blue-400">Update Profile</router-link>
        <router-link to="/login" v-if="!isLoggedIn" class="block mb-4 hover:text-blue-400">Login</router-link>
        <router-link to="/register" v-if="!isLoggedIn" class="block mb-4 hover:text-blue-400">Register</router-link>
        <button v-if="isLoggedIn" @click="showLogoutConfirmation = true" class="bg-red-600 px-3 py-1 rounded hover:bg-red-700">Logout</button>
      </nav>
    </aside>

    <main class="flex-1 container mx-auto p-4">
      <!-- Loading Spinner -->
      <div v-if="isLoading" class="loading-spinner">
        <svg class="animate-spin h-10 w-10 text-blue-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0a12 12 0 00-12 12h4z"></path>
        </svg>
        <p class="text-center mt-2 text-blue-600">Loading...</p>
      </div>
      <!-- Transisi saat berpindah halaman -->
      <transition name="fade" mode="out-in">
        <router-view v-show="!isLoading" />
      </transition>
    </main>
  </div>

  <Footer />

  <!-- Logout Confirmation Modal -->
  <div v-if="showLogoutConfirmation" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-4 rounded shadow-lg w-80">
      <p class="mb-4 text-lg">Are you sure you want to logout?</p>
      <div class="flex justify-end space-x-2">
        <button @click="logout" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Yes</button>
        <button @click="showLogoutConfirmation = false" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">No</button>
      </div>
    </div>
  </div>

  <!-- Logout Success Message -->
  <div v-if="isLogoutSuccess" class="fixed bottom-4 right-4 bg-green-500 text-white p-4 rounded shadow-lg">
    <p>Successfully logged out!</p>
  </div>
</template>

<style scoped>
header {
  background-color: #1e40af; /* Darker blue for header */
  color: white;
  padding: 1rem;
}

button {
  background-color: #2563eb; /* Blue for button */
  color: white;
}

button:hover {
  background-color: #1d4ed8; /* Darker blue for hover */
}

nav a {
  color: white;
  text-decoration: none;
}

nav a:hover {
  color: #dbeafe; /* Light blue for hover */
}

button:hover {
  background-color: #ef4444; /* Red for hover */
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

.fixed {
  position: fixed;
}

.bg-gray-600 {
  background-color: rgba(75, 85, 99, 0.6);
}

.bg-gray-300 {
  background-color: #d1d5db;
}

.bg-green-500 {
  background-color: #10b981;
}

.bg-red-600 {
  background-color: #dc2626;
}

.bg-blue-800 {
  background-color: #1e40af;
}

.bg-blue-600 {
  background-color: #2563eb;
}
</style>
