<script setup>
import { ref, onMounted } from 'vue';
import axios from '../api/axios.js';

const profile = ref({});
const errorMessage = ref('');

const fetchProfile = async () => {
  try {
    const response = await axios.get('/profiles');
    profile.value = response.data;
  } catch (error) {
    errorMessage.value = 'Data Profil masih Kosong';
  }
};

onMounted(fetchProfile);
</script>

<template>
  <div class="max-w-lg mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Profile</h1>
    
    <div v-if="errorMessage" class="text-red-500 mt-4 text-center">
      {{ errorMessage }}
    </div>
    
    <div v-else class="bg-white shadow-lg rounded-lg p-6">
      <div class="mb-4">
        <h2 class="text-2xl font-semibold mb-2">Bio</h2>
        <p class="text-gray-700">{{ profile.bio }}</p>
      </div>
      <div>
        <h2 class="text-2xl font-semibold mb-2">Age</h2>
        <p class="text-gray-700">{{ profile.age }} Tahun</p>
      </div>
    </div>
  </div>
</template>

<style scoped>
h1 {
  color: #1e40af;
}

.bg-white {
  background-color: #ffffff;
}

.shadow-lg {
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.rounded-lg {
  border-radius: 0.5rem;
}
</style>
