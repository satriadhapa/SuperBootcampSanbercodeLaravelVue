<template>
    <div class="min-h-screen bg-gray-100 p-4">
      <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Cast List</h1>
        <ul class="list-disc pl-5">
          <li v-for="(castMember, index) in cast" :key="index" class="text-lg">
            {{ castMember }}
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const cast = ref([
    'Actor A',
    'Actor B',
    'Actor C',
    'Actor D',
    'Actor E',
    // Add more cast members here
  ]);
  </script>
  
  <style scoped>
  /* Tambahkan styling tambahan sesuai kebutuhan */
  </style>
  