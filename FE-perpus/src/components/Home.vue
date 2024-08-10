<template>
  <div class="container mx-auto p-6 bg-gray-100 min-h-screen">
    <h1 class="text-3xl font-extrabold mb-6 text-center text-blue-700">Selamat Datang di Perpustakaan Online</h1>
    
    <!-- Loading Spinner -->
    <div v-if="isLoading" class="flex justify-center items-center min-h-screen">
      <svg class="animate-spin h-12 w-12 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0a12 12 0 00-12 12h4z"></path>
      </svg>
    </div>

    <!-- Error Message -->
    <div v-if="errorMessage" class="text-center mb-6">
      <p class="text-red-500">{{ errorMessage }}</p>
      <button @click="fetchData" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Try Again</button>
    </div>

    <!-- Books Section -->
    <div v-if="!isLoading && !errorMessage && books.length" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div v-for="book in books" :key="book.id" class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-xl transition-shadow transform hover:scale-105">
        <img :src="book.image" alt="Book Image" class="w-full h-56 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-bold text-gray-800">{{ book.title }}</h3>
          <p class="text-gray-600 mt-2">{{ book.summary }}</p>
          <p class="book-stock">Stock: {{ book.stok }}</p>
          <p class="text-sm text-gray-500 mt-4">Category: {{ book.category.name }}</p>
        </div>
      </div>
    </div>
    <div v-else-if="!isLoading && !errorMessage">
      <p class="text-gray-600 text-center">No books available.</p>
    </div>
    <br>

    <!-- Categories Section -->
    <h2 class="text-2xl font-semibold mb-4 text-gray-700 text-center">Kategori</h2>
    <div v-if="!isLoading && !errorMessage && categories.length" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
      <div v-for="category in categories" :key="category.id" class="p-6 bg-white shadow-md rounded-lg hover:shadow-xl transition-shadow transform hover:scale-105">
        <h3 class="text-xl font-bold text-gray-800">{{ category.name }}</h3>
      </div>
    </div>
    <div v-else-if="!isLoading && !errorMessage">
      <p class="text-gray-600 text-center">No categories available.</p>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import apiClient from '@/api/axios.js';

const categories = ref([]);
const books = ref([]);
const errorMessage = ref('');
const isLoading = ref(true);

const fetchData = async () => {
  isLoading.value = true;
  errorMessage.value = '';
  try {
    const categoriesResponse = await apiClient.get('/categories');
    categories.value = categoriesResponse.data;

    const booksResponse = await apiClient.get('/books');
    books.value = booksResponse.data;
  } catch (error) {
    errorMessage.value = 'Error fetching data.';
  } finally {
    isLoading.value = false;
  }
};

onMounted(() => {
  fetchData();
});
</script>

<style scoped>
.container {
  max-width: 1200px;
  margin: 0 auto;
}

h1, h2 {
  color: #1d4ed8;
}

.grid {
  display: grid;
  gap: 1.5rem;
}

p {
  color: #555;
}

.hover\\:shadow-xl:hover {
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.transform {
  transition: transform 0.3s;
}
</style>
