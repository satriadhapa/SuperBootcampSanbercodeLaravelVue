<template>
    <div class="min-h-screen bg-gray-100 p-4">
      <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Film List</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
          <FilmCard
            v-for="(film, index) in films"
            :key="index"
            :film="film"
          />
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import FilmCard from '@/components/FilmCard.vue';
  import poster1 from '@/assets/minion.png';
  import poster2 from '@/assets/avenger.png';
  import poster3 from '@/assets/satuhari.png';
  import poster4 from '@/assets/serdam.jpg';
  
  const films = ref([
    {
      title: 'Minion',
      description: 'Deskripsi singkat tentang Film A',
      poster: poster1,
    },
    {
      title: 'avenger',
      description: 'Perjuangan Superhero',
      poster: poster2,
    },
    {
      title: 'satu hari',
      description: 'berbeda dalam 1 hari',
      poster: poster3,
    },
    {
      title: 'serdam',
      description: 'the death whistle',
      poster: poster4,
    },
    
  ]);
  </script>
  
  <style scoped>
  
  </style>
  