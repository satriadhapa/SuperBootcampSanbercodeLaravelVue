<template>
  <nav class="bg-gradient-to-r from-gray-500 to-indigo-400 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
      <a href="/" class="flex items-center">
        <img alt="logo" class="logo h-10 w-10 transform transition-transform duration-500 hover:scale-110" src="@/assets/log.png" />
        <span class="text-white text-xl font-bold ml-2">Review Film</span>
      </a>
      <div class="flex space-x-4 items-center">
        <router-link to="/" class="text-white text-lg hover:underline">Home</router-link>
        <router-link to="/login" class="text-white text-lg hover:underline">Login</router-link>
        <router-link to="/register" class="text-white text-lg hover:underline">Register</router-link>
        <router-link to="/verify-account" class="text-white text-lg hover:underline">Verify Account</router-link>
        <router-link to="/film" class="text-white text-lg hover:underline">Film</router-link>
        <router-link to="/genre" class="text-white text-lg hover:underline">Genre</router-link>
        <router-link to="/cast" class="text-white text-lg hover:underline">Cast</router-link>
        <input type="text" placeholder="Search..." class="p-2 rounded bg-white text-black focus:outline-none focus:ring-2 focus:ring-purple-300" />
      </div>
    </div>
  </nav>
</template>

<script setup>
</script>

<style scoped>
.logo {
  transition: transform 0.5s ease;
}
</style>
