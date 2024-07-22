<template>
  <div class="from bg-gray-400 to bg-indigo-150 min-h-screen flex flex-col">
    <Banner />
    <div class="container mx-auto p-4 flex-1">
      <h1 class="text-3xl font-bold mb-4 text-center">Daftar Film</h1>
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
import Banner from '@/components/banner.vue';
import Footer from '@/components/footer.vue';
import poster1 from '@/assets/minion.png';
import poster2 from '@/assets/avenger.png';
import poster3 from '@/assets/satuhari.png';
import poster4 from '@/assets/serdam.jpg';

const films = ref([
  {
    title: "Minion",
    description: 'Deskripsi singkat tentang Film A',
    poster: poster1,
  },
  {
    title: "Avenger",
    description: 'Perjuangan Superhero',
    poster: poster2,
  },
  {
    title: "Satu Hari",
    description: 'Berbeda dalam 1 hari',
    poster: poster3,
  },
  {
    title: "Serdam",
    description: 'The death whistle',
    poster: poster4,
  },
]);
</script>

<style scoped>
/* Tambahkan styling tambahan sesuai kebutuhan */
</style>
