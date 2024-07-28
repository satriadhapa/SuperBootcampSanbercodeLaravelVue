<template>
  <div class="min-h-screen bg-gray-100 p-4">
    <div class="container mx-auto p-4">
      <h1 class="text-3xl font-bold mb-6 text-center">Genre List</h1>

      <div class="mb-6">
        <input v-model="newGenre" placeholder="Add new genre" class="p-2 border rounded">
        <button @click="addGenre" class="bg-blue-500 text-white p-2 rounded ml-2">Add Genre</button>
      </div>

      <ul class="list-disc pl-5">
        <li v-for="(genre, index) in genres" :key="genre.id" class="text-lg flex items-center justify-between">
          <input v-model="genre.name" @blur="updateGenre(genre)" class="p-2 border rounded">
          <button @click="deleteGenre(genre.id)" class="bg-red-500 text-white p-2 rounded ml-2">Delete</button>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import { useStore } from 'vuex';

const store = useStore();
const newGenre = ref('');

const genres = computed(() => store.getters.genres);

const fetchGenres = () => {
  store.dispatch('fetchGenres');
};

const addGenre = async () => {
  if (newGenre.value.trim() === '') return;
  try {
    await store.dispatch('createGenre', { name: newGenre.value });
    newGenre.value = '';
  } catch (error) {
    console.error('Failed to add genre:', error);
  }
};

const updateGenre = async (genre) => {
  try {
    await store.dispatch('updateGenre', genre);
  } catch (error) {
    console.error('Failed to update genre:', error);
  }
};

const deleteGenre = async (id) => {
  try {
    await store.dispatch('deleteGenre', id);
  } catch (error) {
    console.error('Failed to delete genre:', error);
  }
};

onMounted(() => {
  fetchGenres();
});
</script>

<style scoped>
/* Tambahkan styling tambahan sesuai kebutuhan */
</style>
