<template>
    <div class="relative overflow-hidden bg-gray-800 text-white rounded-lg shadow-lg">
      <div class="absolute inset-0">
        <img :src="backgroundImage" alt="Banner Background" class="w-full h-full object-cover opacity-60" />
      </div>
      <div class="relative z-10 container mx-auto p-6">
        <h2 class="text-4xl font-bold mb-4">Top Films</h2>
        <div class="flex space-x-4 overflow-x-auto">
          <div v-for="(film, index) in topFilms" :key="index" class="flex-none w-64 bg-white text-black rounded-lg shadow-md overflow-hidden">
            <img :src="film.poster" alt="Film Poster" class="w-full h-full object-cover">
            <!-- <div class="p-5">
              <h3 class="text-lg font-bold mb-2 text-center">{{ film.title }}</h3>
              <p class="text-gray-700 text-center">{{ film.description }}</p>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import gambar_back from '@/assets/bg.jpg'
  import poster1 from '@/assets/minion.png';
  import poster2 from '@/assets/avenger.png';
  import poster3 from '@/assets/satuhari.png';
  import poster4 from '@/assets/serdam.jpg';
  import poster5 from '@/assets/ziarah.jpg';
  import poster6 from '@/assets/semesta.jpg';
  
  
  const topFilms = ref([
    {
      title: "Minion",
      description: "Perjuangan Minion",
      poster: poster1,
    },
    {
      title: "Minion",
      description: "Perjuangan Minion",
      poster: poster2,
    },
    {
      title: "Minion",
      description: "Perjuangan Minion",
      poster: poster3,
    },
    {
      title: "Minion",
      description: "Perjuangan Minion",
      poster: poster4,
    },
    {
      title: "Minion",
      description: "Perjuangan Minion",
      poster: poster5,
    },
    {
      title: "Minion",
      description: "Perjuangan Minion",
      poster: poster6,
    },
  ]);
  
  const backgroundImage = gambar_back; // Gambar latar belakang banner
  </script>
  
  <style scoped>
  </style>
  