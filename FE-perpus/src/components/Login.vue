<template>
    <div class="container mx-auto p-4">
      <h1 class="text-2xl font-bold mb-4">Login</h1>
      <form @submit.prevent="login">
        <input v-model="email" type="email" placeholder="Email" class="border p-2 mb-2 w-full" required />
        <input v-model="password" type="password" placeholder="Password" class="border p-2 mb-2 w-full" required />
        <button type="submit" class="bg-blue-500 text-white p-2 w-full">Login</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import apiClient from '@/api/axios';
  import { useRouter } from 'vue-router';
  
  const email = ref('');
  const password = ref('');
  const router = useRouter();
  
  const login = async () => {
    try {
      const response = await apiClient.post('/login', {
        email: email.value,
        password: password.value,
      });
      console.log(response.data);
      localStorage.setItem('token', response.data.token);
      localStorage.setItem('role', response.data.role);
      router.push('/');
    } catch (error) {
      console.error(error);
    }
  };
  </script>
  