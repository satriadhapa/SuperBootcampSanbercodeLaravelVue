<template>
    <div>
      <ul>
        <li v-for="(item, index) in portfolioItems" :key="index">
          {{ item.name }} - {{ item.description }}
        </li>
      </ul>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const portfolioItems = ref([
    { name: 'Project 1', description: 'Description of Project 1' },
    { name: 'Project 2', description: 'Description of Project 2' },
    // Add more portfolio items here
  ]);
  </script>
  
  <style scoped>
  </style>
  