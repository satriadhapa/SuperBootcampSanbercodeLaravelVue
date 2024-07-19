<template>
  <div id="app">
    <Header />
    <transition name="fade" mode="out-in"></transition>
    <router-view />
    <Footer />
  </div>
</template>

<script setup>
import Header from './components/header.vue';
import Footer from './components/footer.vue';
</script>

<style>
@import 'tailwindcss/tailwind.css';
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.9s ease;
}

.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
  opacity: 0;
}
</style>
