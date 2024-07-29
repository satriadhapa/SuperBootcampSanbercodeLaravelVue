<template>
  <div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
      <img
        :src="film.poster"
        alt="Film Poster"
        class="w-full h-64 object-cover cursor-pointer"
        @click="openModal"
      />
      <div class="p-4">
        <h2 class="text-xl font-bold mb-2">{{ film.title }}</h2>
        <p class="text-gray-700">{{ film.summary }}</p>
      </div>
    </div>

    <div v-if="isModalOpen" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
      <div class="relative">
        <img :src="film.poster" alt="Film Poster" class="max-w-full max-h-full object-cover" />
        <button @click="closeModal" class="absolute top-2 right-2 text-white text-3xl">&times;</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
  film: {
    type: Object,
    required: true,
  },
});

const isModalOpen = ref(false);

const openModal = () => {
  isModalOpen.value = true;
};

const closeModal = () => {
  isModalOpen.value = false;
};
</script>

<style scoped>
</style>
