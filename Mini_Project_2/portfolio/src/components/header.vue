<template>
  <header class="flex justify-between items-center p-4 bg-gray-800 text-white">
    <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />

    <div class="flex items-center">
      <nav class="flex space-x-4">
        <RouterLink to="/" class="hover:underline">Home</RouterLink>
        <RouterLink to="/about" class="hover:underline">About</RouterLink>
        <RouterLink to="/portfolio" class="hover:underline">Portfolio</RouterLink>
      </nav>
    </div>
  </header>
</template>

<script setup>
import { RouterLink } from 'vue-router';
</script>

<style scoped>
.logo {
  width: 125px;
  height: 125px;
}
</style>
