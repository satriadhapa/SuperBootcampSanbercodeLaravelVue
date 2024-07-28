<template>
  <div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4 text-center">Profile</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
      <div v-if="profile">
        <p v-if="profile.user"><strong>Name:</strong> {{ profile.user.name }}</p>
        <p v-if="profile.user"><strong>Email:</strong> {{ profile.user.email }}</p>
        <p v-if="profile.age"><strong>Age:</strong> {{ profile.age }}</p>
        <p v-if="profile.biodata"><strong>Biodata:</strong> {{ profile.biodata }}</p>
        <p v-if="profile.address"><strong>Address:</strong> {{ profile.address }}</p>
      </div>
      <div v-else>
        <p>Loading profile...</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, computed } from 'vue';
import { useStore } from 'vuex';

const store = useStore();
const profile = computed(() => store.getters.profile);

onMounted(() => {
  store.dispatch('fetchProfile');
});
</script>

<style scoped>
/* Add any scoped styles here */
</style>
