<template>
    <div class="container mx-auto p-4">
      <h1 class="text-2xl font-bold mb-4">Home</h1>
      <div v-for="book in books" :key="book.id" class="border p-4 mb-2">
        <h2 class="text-xl font-bold">{{ book.title }}</h2>
        <p>{{ book.summary }}</p>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import apiClient from '@/api/axios';
  
  const books = ref([]);
  
  const fetchBooks = async () => {
    try {
      const response = await apiClient.get('/books');
      books.value = response.data;
    } catch (error) {
      console.error(error);
    }
  };
  
  onMounted(fetchBooks);
  </script>
  