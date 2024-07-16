<template>
  <div id="app">
    <Header />
    <router-view />
  </div>
</template>

<script setup>
import Header from './components/header.vue';
</script>

<style>
@import 'tailwindcss/tailwind.css';
</style>
