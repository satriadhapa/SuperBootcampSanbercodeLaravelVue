<template>
  <div class="container mx-auto p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div v-for="(item, index) in portfolioItems" :key="index" class="bg-white p-4 shadow-lg rounded-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
        <img :src="item.image" alt="Project Image" class="w-full h-48 object-cover mb-4 rounded-md">
        <h2 class="text-xl font-bold mb-2">{{ item.name }}</h2>
        <p class="text-gray-600 mb-2">{{ item.description }}</p>
        <a :href="item.link" target="_blank" class="text-blue-500 hover:underline">View Project</a>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import project1 from '@/assets/datascience.jpg';
import project2 from '@/assets/analis.png';
import project3 from '@/assets/analisis.jpg';

const portfolioItems = ref([
  { 
    name: 'Project Data Science', 
    description: 'Description of Project 1', 
    link: '#',
    image: project1
  },
  { 
    name: 'Project Data Analis', 
    description: 'Description of Project 2', 
    link: '#',
    image: project2
  },
  { 
    name: 'Project Web Development', 
    description: 'Description of Project 3', 
    link: '#',
    image: project3
  },
  { 
    name: 'Project ', 
    description: 'Description of Project 3', 
    link: '#',
    image: project3
  },
]);
</script>

<style scoped>
</style>
