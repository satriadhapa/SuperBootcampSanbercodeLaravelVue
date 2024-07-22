<template>
  <div id="app">
    <Navbar />
    <transition name="fade" mode="out-in">
      <router-view></router-view>
    </transition>
  </div>
</template>

<script setup>
import Navbar from './components/navbar.vue';
import Footer from './components/footer.vue';
</script>

<style>
@import './tailwind.css';

.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>
