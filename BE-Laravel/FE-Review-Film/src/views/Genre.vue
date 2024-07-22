<template>
    <div class="min-h-screen bg-gray-100 p-4">
      <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Genre List</h1>
        <ul class="list-disc pl-5">
          <li v-for="(genre, index) in genres" :key="index" class="text-lg">
            {{ genre }}
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const genres = ref([
    'Action',
    'Comedy',
    'Drama',
    'Horror',
    'Science Fiction',
    // Add more genres here
  ]);
  </script>
  
  <style scoped>
  /* Tambahkan styling tambahan sesuai kebutuhan */
  </style>
  