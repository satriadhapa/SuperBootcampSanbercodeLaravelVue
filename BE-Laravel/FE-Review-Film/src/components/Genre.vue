<template>
  <div class="min-h-screen bg-gray-100 p-4">
    <div class="container mx-auto p-4">
      <h1 class="text-3xl font-bold mb-6 text-center">Genre List</h1>

      <div class="mb-6 flex items-center">
        <input v-model="newGenre" placeholder="Add new genre" class="p-2 border rounded flex-1 mr-2">
        <button @click="addGenre" class="bg-blue-500 text-white p-2 rounded">Add Genre</button>
      </div>

      <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full bg-white">
          <thead>
            <tr>
              <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700 uppercase tracking-wider">#</th>
              <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700 uppercase tracking-wider">Genre Name</th>
              <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(genre, index) in genres" :key="genre.id" class="hover:bg-gray-100">
              <td class="py-2 px-4 border-b border-gray-300">{{ index + 1 }}</td>
              <td class="py-2 px-4 border-b border-gray-300">{{ genre.name }}</td>
              <td class="py-2 px-4 border-b border-gray-300">
                <button @click="editGenre(index)" class="bg-yellow-500 text-white p-2 rounded ml-2">Edit</button>
                <button @click="deleteGenre(genre.id)" class="bg-red-500 text-white p-2 rounded ml-2">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div v-if="editingIndex !== null" class="mt-6">
        <input v-model="editingGenre.name" class="p-2 border rounded mr-2">
        <button @click="updateGenre" class="bg-green-500 text-white p-2 rounded ml-2">Update Genre</button>
        <button @click="cancelEdit" class="bg-gray-500 text-white p-2 rounded ml-2">Cancel</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import { useStore } from 'vuex';

const store = useStore();
const newGenre = ref('');
const editingIndex = ref(null);
const editingGenre = ref({ id: null, name: '' });

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

const editGenre = (index) => {
  editingIndex.value = index;
  editingGenre.value = { ...genres.value[index] };
};

const updateGenre = async () => {
  try {
    await store.dispatch('updateGenre', editingGenre.value);
    editingIndex.value = null;
    editingGenre.value = { id: null, name: '' };
  } catch (error) {
    console.error('Failed to update genre:', error);
  }
};

const cancelEdit = () => {
  editingIndex.value = null;
  editingGenre.value = { id: null, name: '' };
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
