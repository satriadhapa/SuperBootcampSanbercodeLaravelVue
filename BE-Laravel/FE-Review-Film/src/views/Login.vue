<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
      <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>
        <form @submit.prevent="handleLogin">
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input
              id="email"
              v-model="email"
              type="email"
              placeholder="Enter your email"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              required
            />
          </div>
          <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input
              id="password"
              v-model="password"
              type="password"
              placeholder="Enter your password"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              required
            />
          </div>
          <button
            type="submit"
            class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            Login
          </button>
          <p class="mt-4 text-sm text-center">
            Don't have an account? 
            <router-link to="/register" class="text-blue-500 hover:underline">Register</router-link>
          </p>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const email = ref('');
  const password = ref('');
  
  const handleLogin = () => {
    // Handle login logic here
    console.log('Email:', email.value);
    console.log('Password:', password.value);
  };
  </script>
  
  <style scoped>
  /* Tambahkan styling tambahan sesuai kebutuhan */
  </style>
  