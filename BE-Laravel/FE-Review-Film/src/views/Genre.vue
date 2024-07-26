<template>
  <div class="min-h-screen bg-gray-100 p-4">
    <div class="container mx-auto p-4">
      <h1 class="text-3xl font-bold mb-6 text-center">Genre List</h1>
      <ul class="list-disc pl-5">
        <li v-for="(genre, index) in genres" :key="index" class="text-lg">
          {{ genre.name }}
        </li>
      </ul>
      <div v-if="isAdmin" class="mt-6">
        <h2 class="text-2xl font-bold mb-4">Manage Genres</h2>
        <form @submit.prevent="createGenre">
          <input v-model="newGenre" type="text" placeholder="New Genre" class="mb-2 p-2 border border-gray-300 rounded">
          <button type="submit" class="bg-blue-500 text-white p-2 rounded">Add Genre</button>
        </form>
        <div v-for="genre in genres" :key="genre.id" class="flex items-center mt-4">
          <input v-model="genre.name" type="text" class="p-2 border border-gray-300 rounded mr-2">
          <button @click="updateGenre(genre)" class="bg-green-500 text-white p-2 rounded mr-2">Update</button>
          <button @click="deleteGenre(genre.id)" class="bg-red-500 text-white p-2 rounded">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from '@/plugins/axios.js';
import { useStore } from 'vuex';

const store = useStore();
const genres = ref([]);
const newGenre = ref('');

const isAdmin = computed(() => store.getters.isAdmin);

const fetchGenres = async () => {
  const response = await axios.get('/genre');
  genres.value = response.data.data;
};

const createGenre = async () => {
  if (!newGenre.value) return;
  await axios.post('/genre', { name: newGenre.value });
  newGenre.value = '';
  fetchGenres();
};

const updateGenre = async (genre) => {
  await axios.put(`/genre/${genre.id}`, genre);
  fetchGenres();
};

const deleteGenre = async (id) => {
  await axios.delete(`/genre/${id}`);
  fetchGenres();
};

onMounted(() => {
  fetchGenres();
});
</script>

<style scoped>
/* Tambahkan styling tambahan sesuai kebutuhan */
</style>
