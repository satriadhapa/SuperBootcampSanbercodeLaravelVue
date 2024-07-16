<template>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div v-for="(item, index) in portfolioItems" :key="index" class="bg-white p-4 shadow-lg rounded-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
        <h2 class="text-xl font-bold mb-2">{{ item.name }}</h2>
        <p>{{ item.description }}</p>
        <a :href="item.link" target="_blank" class="text-blue-500 hover:underline">View Project</a>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const portfolioItems = ref([
    { name: 'Project 1', description: 'Description of Project 1', link: '#' },
    { name: 'Project 2', description: 'Description of Project 2', link: '#' },
    { name: 'Project 2', description: 'Description of Project 2', link: '#' },
  ]);
  </script>
  
  <style scoped>
  </style>
  