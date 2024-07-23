<template>
    <div class="container mx-auto p-4">
      <h1 class="text-3xl font-bold mb-4 text-center">Profile</h1>
      <div class="bg-white p-6 rounded-lg shadow-md">
        <p><strong>Nama:</strong> {{ user.name }}</p>
        <p><strong>Email:</strong> {{ user.email }}</p>
        <router-link to="/update-user" class="text-blue-500">Update Profile</router-link>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const user = ref({
    name: 'John Doe',
    email: 'john.doe@example.com',
  });
  </script>
  
  <style scoped>
  </style>
  