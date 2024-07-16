<template>
  <header class="flex justify-between items-center p-4 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white shadow-lg">
    <img alt="Vue logo" class="logo" src="@/assets/logo.svg" />

    <div class="flex items-center">
      <nav class="flex space-x-6">
        <RouterLink to="/" class="nav-link">Home</RouterLink>
        <RouterLink to="/about" class="nav-link">About</RouterLink>
        <RouterLink to="/portfolio" class="nav-link">Portfolio</RouterLink>
        <RouterLink to="/experience" class="nav-link">Experience</RouterLink>
        <RouterLink to="/contact" class="nav-link">Contact</RouterLink>
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
  transition: transform 0.3s ease-in-out;
}

.logo:hover {
  transform: scale(1.1);
}

.nav-link {
  position: relative;
  text-decoration: none;
  color: white;
  font-weight: bold;
  margin-right: 1rem; /* Add margin to the right of each link */
  transition: color 0.3s ease-in-out;
}

.nav-link::after {
  content: '';
  position: absolute;
  width: 100%;
  height: 2px;
  background-color: white;
  left: 0;
  bottom: -4px;
  transform: scaleX(0);
  transform-origin: right;
  transition: transform 0.3s ease-in-out;
}

.nav-link:hover {
  color: yellow;
}

.nav-link:hover::after {
  transform: scaleX(1);
  transform-origin: left;
}
</style>
