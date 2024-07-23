<template>
  <nav class="bg-gradient-to-r from-gray-500 to-indigo-400 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
      <a href="/" class="flex items-center">
        <img alt="logo" class="logo h-10 w-10 transform transition-transform duration-500 hover:scale-110" src="@/assets/log.png" />
        <span class="text-white text-xl font-bold ml-2">Review Film</span>
      </a>
      <div class="hidden md:flex space-x-4 items-center">
        <router-link to="/" class="text-white text-lg hover:underline">Home</router-link>
        <router-link to="/film" class="text-white text-lg hover:underline">Film</router-link>
        <router-link to="/genre" class="text-white text-lg hover:underline">Genre</router-link>
        <router-link to="/cast" class="text-white text-lg hover:underline">Cast</router-link>
        <router-link to="/login" class="text-white text-lg hover:underline">Login</router-link>
        <router-link to="/register" class="text-white text-lg hover:underline">Register</router-link>
        <router-link to="/verify-account" class="text-white text-lg hover:underline">Verify Account</router-link>
      </div>
      <div class="md:hidden">
        <button @click="isOpen = !isOpen" class="text-white focus:outline-none">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path :class="{'hidden': isOpen, 'block': !isOpen}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            <path :class="{'block': isOpen, 'hidden': !isOpen}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
    </div>
    <div :class="{'block': isOpen, 'hidden': !isOpen}" class="md:hidden">
      <router-link to="/" class="block text-white text-lg hover:underline px-4 py-2">Home</router-link>
      <router-link to="/film" class="block text-white text-lg hover:underline px-4 py-2">Film</router-link>
      <router-link to="/genre" class="block text-white text-lg hover:underline px-4 py-2">Genre</router-link>
      <router-link to="/cast" class="block text-white text-lg hover:underline px-4 py-2">Cast</router-link>
      <router-link to="/profile" class="block text-white text-lg hover:underline px-4 py-2">profile</router-link>
      <router-link to="/update-user" class="block text-white text-lg hover:underline px-4 py-2">Update User</router-link>
      <router-link to="/login" class="block text-white text-lg hover:underline px-4 py-2">Login</router-link>
      <router-link to="/register" class="block text-white text-lg hover:underline px-4 py-2">Register</router-link>
      <router-link to="/verify-account" class="block text-white text-lg hover:underline px-4 py-2">Verify Account</router-link>
    </div>
  </nav>
</template>

<script setup>
import { ref } from 'vue';

const isOpen = ref(false);
</script>

<style scoped>
.logo {
  transition: transform 0.5s ease;
}
</style>
