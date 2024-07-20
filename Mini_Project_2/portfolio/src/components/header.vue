<template>
  <header class="flex justify-between items-center p-4 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white shadow-lg">
    <a href="/"><img alt="logo" class="logo" src="@/assets/log.png" /></a>

    <button @click="toggleMenu" class="md:hidden text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
      
    <div class="flex items-center">
      <nav :class="['md:flex', showMenu ? 'block' : 'hidden']" class="absolute md:relative md:flex md:items-center bg-gray-800 md:bg-transparent w-full md:w-auto top-16 md:top-auto left-0 md:left-auto p-4 md:p-0">
        <RouterLink to="/" class="block md:inline-block hover:underline p-2 md:px-4">Home</RouterLink>
        <RouterLink to="/about" class="block md:inline-block hover:underline p-2 md:px-4">About</RouterLink>
        <RouterLink to="/portfolio" class="block md:inline-block hover:underline p-2 md:px-4">Portfolio</RouterLink>
        <RouterLink to="/experience" class="block md:inline-block hover:underline p-2 md:px-4">Experience</RouterLink>
        <RouterLink to="/contact" class="block md:inline-block hover:underline p-2 md:px-4">Contact</RouterLink>
      </nav>
    </div>
  </header>
  
</template>

<script setup>
import { RouterLink } from 'vue-router';
import { ref } from 'vue';

const showMenu = ref(false);

const toggleMenu = () => {
  showMenu.value = !showMenu.value;
};
</script>

<style scoped>

.container {
  max-width: 100%;
  padding-left: 1rem;
  padding-right: 1rem;
}

@media (min-width: 768px) {
  .container {
    max-width: 75%;
  }
}

@media (min-width: 1024px) {
  .container {
    max-width: 50%;
  }
}
.logo {
  width: 55px;
  height: 55px;
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
  transition: color 0.8s ease-in-out;
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
  color: rgb(255, 255, 152);
}

.nav-link:hover::after {
  transform: scaleX(1);
  transform-origin: left;
}
</style>
