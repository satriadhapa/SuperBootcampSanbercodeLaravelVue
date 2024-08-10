<template>
  <div class="container mx-auto p-4 max-w-md">
    <h1 class="text-2xl font-bold mb-4">Login</h1>

    <!-- Error Message -->
    <div v-if="errorMessage" class="bg-red-200 text-red-800 p-2 rounded mb-4">
      {{ errorMessage }}
    </div>

    <!-- Loading Spinner -->
    <div v-if="isLoading" class="text-center mb-4">
      <svg class="animate-spin h-8 w-8 text-blue-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0a12 12 0 00-12 12h4z"></path>
      </svg>
    </div>

    <!-- Login Form -->
    <form @submit.prevent="login">
      <input v-model="email" type="email" placeholder="Email" class="border p-2 mb-2 w-full rounded" required />
      <input v-model="password" type="password" placeholder="Password" class="border p-2 mb-2 w-full rounded" required />
      <button type="submit" :disabled="isLoading" class="bg-blue-500 text-white p-2 w-full rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
        Login
      </button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import apiClient from '@/api/axios';
import { useRouter } from 'vue-router';

const email = ref('');
const password = ref('');
const errorMessage = ref('');
const isLoading = ref(false);
const router = useRouter();

const login = async () => {
  errorMessage.value = '';
  isLoading.value = true;
  
  try {
    const response = await apiClient.post('/login', {
      email: email.value,
      password: password.value,
    });

    localStorage.setItem('token', response.data.token);
    localStorage.setItem('role', response.data.role);
    router.push('/');
  } catch (error) {
    if (error.response && error.response.data) {
      errorMessage.value = error.response.data.message || 'Login failed. Please try again.';
    } else {
      errorMessage.value = 'An error occurred. Please try again.';
    }
  } finally {
    isLoading.value = false;
  }
};
</script>

<style scoped>
.container {
  max-width: 400px;
}

input {
  border-color: #ddd;
}

button:disabled {
  background-color: #b0bec5;
  cursor: not-allowed;
}

button {
  transition: background-color 0.3s;
}
</style>
