<template>
  <div class="min-h-screen bg-gray-100 p-4">
    <div class="container mx-auto p-4">
      <h1 class="text-3xl font-bold mb-6 text-center">Cast List</h1>
      <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full bg-white">
          <thead>
            <tr>
              <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700 uppercase tracking-wider">#</th>
              <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700 uppercase tracking-wider">Name</th>
              <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700 uppercase tracking-wider">Age</th>
              <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700 uppercase tracking-wider">Bio</th>
              <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(cast, index) in casts" :key="cast.id" class="hover:bg-gray-100">
              <td class="py-2 px-4 border-b border-gray-300">{{ index + 1 }}</td>
              <td class="py-2 px-4 border-b border-gray-300">{{ cast.name }}</td>
              <td class="py-2 px-4 border-b border-gray-300">{{ cast.age }}</td>
              <td class="py-2 px-4 border-b border-gray-300">{{ cast.bio }}</td>
              <td class="py-2 px-4 border-b border-gray-300">
                <button @click="editCast(index)" class="bg-yellow-500 text-white p-2 rounded ml-2">Edit</button>
                <button @click="deleteCast(cast.id)" class="bg-red-500 text-white p-2 rounded ml-2">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div v-if="editingIndex !== null" class="mt-6">
        <input v-model="editingCast.name" placeholder="Name" class="p-2 border rounded mr-2">
        <input v-model="editingCast.age" type="number" placeholder="Age" class="p-2 border rounded mr-2">
        <input v-model="editingCast.bio" placeholder="Bio" class="p-2 border rounded mr-2">
        <button @click="updateCast" class="bg-green-500 text-white p-2 rounded ml-2">Update Cast</button>
        <button @click="cancelEdit" class="bg-gray-500 text-white p-2 rounded ml-2">Cancel</button>
      </div>
      <div class="mt-6">
        <input v-model="newCast.name" placeholder="Name" class="p-2 border rounded mr-2">
        <input v-model="newCast.age" type="number" placeholder="Age" class="p-2 border rounded mr-2">
        <input v-model="newCast.bio" placeholder="Bio" class="p-2 border rounded mr-2">
        <button @click="addCast" class="bg-blue-500 text-white p-2 rounded">Add Cast</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import { useStore } from 'vuex';

const store = useStore();
const casts = computed(() => store.getters.casts);
const newCast = ref({ name: '', age: '', bio: '' });
const editingIndex = ref(null);
const editingCast = ref({ id: null, name: '', age: '', bio: '' });

const fetchCasts = () => {
  store.dispatch('fetchCasts');
};

const addCast = async () => {
  if (!newCast.value.name || !newCast.value.age || !newCast.value.bio) return;
  try {
    await store.dispatch('createCast', newCast.value);
    newCast.value = { name: '', age: '', bio: '' };
  } catch (error) {
    console.error('Failed to add cast:', error);
  }
};

const editCast = (index) => {
  editingIndex.value = index;
  editingCast.value = { ...casts.value[index] };
};

const updateCast = async () => {
  try {
    await store.dispatch('updateCast', editingCast.value);
    editingIndex.value = null;
    editingCast.value = { id: null, name: '', age: '', bio: '' };
  } catch (error) {
    console.error('Failed to update cast:', error);
  }
};

const cancelEdit = () => {
  editingIndex.value = null;
  editingCast.value = { id: null, name: '', age: '', bio: '' };
};

const deleteCast = async (id) => {
  try {
    await store.dispatch('deleteCast', id);
  } catch (error) {
    console.error('Failed to delete cast:', error);
  }
};

onMounted(() => {
  fetchCasts();
});
</script>

<style scoped>
/* Tambahkan styling tambahan sesuai kebutuhan */
</style>