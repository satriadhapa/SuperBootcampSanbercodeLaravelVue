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
  <div class="p-4">
    <h1 class="text-2xl font-bold mb-4">Profile</h1>
    <div v-if="errorMessage" class="text-red-500 mt-4">{{ errorMessage }}</div>
    <div v-else>
      <p><strong>Bio:</strong> {{ profile.bio }}</p>
      <p><strong>Age:</strong> {{ profile.age }}</p>
    </div>
  </div>
</template>

<style scoped>
p {
  margin-bottom: 1rem;
}
</style>
