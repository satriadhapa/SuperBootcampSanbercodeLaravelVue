<template>
    <div class="container mx-auto p-4">
      <h1 class="text-3xl font-bold mb-4 text-center">Update Profile</h1>
      <div class="bg-white p-6 rounded-lg shadow-md">
        <form @submit.prevent="updateProfile">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama</label>
            <input v-model="user.name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
            <input v-model="user.email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" />
          </div>
          <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Update
            </button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const user = ref({
    name: 'John Doe',
    email: 'john.doe@example.com',
  });
  
  const updateProfile = () => {
    // Simulate profile update
    alert('Profile updated!');
  };
  </script>
  
  <style scoped>
  </style>
  