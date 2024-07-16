<template>
    <div class="container mx-auto p-6 text-center animate__animated animate__fadeIn">
      <h1 class="text-4xl font-bold mb-6 text-gray-800">My Portfolio</h1>
      <PortfolioList />
    </div>
  </template>
  
  <script setup>
  import PortfolioList from '../components/PortfolioList.vue';
  </script>
  
  <style scoped>
  @import 'animate.css';
  </style>
  