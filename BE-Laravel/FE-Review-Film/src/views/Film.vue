<template>
  <div class="min-h-screen bg-gray-100 p-4">
    <div class="container mx-auto p-4">
      <h1 class="text-3xl font-bold mb-6 text-center">Film List</h1>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <FilmCard
          v-for="(film, index) in films"
          :key="index"
          :film="film"
        />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import FilmCard from '@/components/FilmCard.vue';
import axios from '@/plugins/axios.js';

const films = ref([]);

onMounted(async () => {
  try {
    const response = await axios.get('/movie');
    films.value = response.data.data;
  } catch (error) {
    console.error('Failed to fetch movies:', error);
  }
});
</script>

<style scoped>
</style>
