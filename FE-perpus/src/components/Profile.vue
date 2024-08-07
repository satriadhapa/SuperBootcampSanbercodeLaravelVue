<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import axios from '../api/axios.js';

const bio = ref('');
const age = ref('');
const errorMessage = ref('');
const successMessage = ref('');

const router = useRouter();

const fetchProfile = async () => {
  try {
    const response = await axios.get('/profiles');
    bio.value = response.data.bio;
    age.value = response.data.age;
  } catch (error) {
    errorMessage.value = 'Error fetching profile.';
  }
};

const updateProfile = async () => {
  try {
    await axios.post('/profiles', {
      bio: bio.value,
      age: age.value
    });
    successMessage.value = 'Profile updated successfully.';
    router.push('/profile-display'); // Redirect to profile display page
  } catch (error) {
    errorMessage.value = 'Error updating profile.';
  }
};

onMounted(fetchProfile);
</script>

<template>
  <div class="p-4">
    <h1 class="text-2xl font-bold mb-4">Profile</h1>
    <form @submit.prevent="updateProfile">
      <div class="mb-4">
        <label for="bio" class="block text-sm font-medium mb-1">Bio</label>
        <textarea v-model="bio" id="bio" rows="4" class="w-full border border-gray-300 p-2 rounded"></textarea>
      </div>
      <div class="mb-4">
        <label for="age" class="block text-sm font-medium mb-1">Age</label>
        <input v-model="age" id="age" type="number" class="w-full border border-gray-300 p-2 rounded"/>
      </div>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
    <div v-if="errorMessage" class="text-red-500 mt-4">{{ errorMessage }}</div>
    <div v-if="successMessage" class="text-green-500 mt-4">{{ successMessage }}</div>
  </div>
</template>

<style scoped>
textarea {
  resize: vertical;
}
</style>
