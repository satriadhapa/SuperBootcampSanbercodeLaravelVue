<template>
  <div id="app">
    <Header />
    <transition name="fade" mode="out-in">
      <router-view />
    </transition>
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

.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>
