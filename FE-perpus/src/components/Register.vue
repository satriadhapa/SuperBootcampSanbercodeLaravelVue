<template>
    <div class="container mx-auto p-4">
      <h1 class="text-2xl font-bold mb-4">Register</h1>
      <form @submit.prevent="register">
        <input v-model="name" type="text" placeholder="Name" class="border p-2 mb-2 w-full" required />
        <input v-model="email" type="email" placeholder="Email" class="border p-2 mb-2 w-full" required />
        <input v-model="password" type="password" placeholder="Password" class="border p-2 mb-2 w-full" required />
        <input v-model="password_confirmation" type="password" placeholder="Confirm Password" class="border p-2 mb-2 w-full" required />
        <button type="submit" class="bg-blue-500 text-white p-2 w-full">Register</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import apiClient from '@/api/axios';
  import { useRouter } from 'vue-router';
  
  const name = ref('');
  const email = ref('');
  const password = ref('');
  const password_confirmation = ref('');
  const router = useRouter();
  
  const register = async () => {
    try {
      const response = await apiClient.post('/register', {
        name: name.value,
        email: email.value,
        password: password.value,
        password_confirmation: password_confirmation.value,
      });
      console.log(response.data);
      router.push('/login');
    } catch (error) {
      console.error(error);
    }
  };
  </script>
  