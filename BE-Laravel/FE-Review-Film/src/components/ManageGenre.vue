<template>
    <div class="min-h-screen bg-gray-100 p-4">
      <div class="container mx-auto p-4">
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
  </template>
  
  <script setup>
  import { ref, computed, onMounted } from 'vue';
  import { useStore } from 'vuex';
  
  const store = useStore();
  const genres = computed(() => store.state.genres);
  const newGenre = ref('');
  
  const createGenre = async () => {
    if (!newGenre.value) return;
    await store.dispatch('createGenre', { name: newGenre.value });
    newGenre.value = '';
  };
  
  const updateGenre = async (genre) => {
    await store.dispatch('updateGenre', genre);
  };
  
  const deleteGenre = async (id) => {
    await store.dispatch('deleteGenre', id);
  };
  
  onMounted(() => {
    store.dispatch('fetchGenres');
  });
  </script>
  
  <style scoped>
  /* Tambahkan styling tambahan sesuai kebutuhan */
  </style>
  