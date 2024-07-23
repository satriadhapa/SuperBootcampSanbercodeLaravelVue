<template>
  <div id="app">
    <Navbar v-if="!$route.meta.hideNavbar" />
    <transition name="fade" mode="out-in">
      <router-view></router-view>
    </transition>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import { useRoute } from 'vue-router';
import Navbar from './components/navbar.vue';
import Footer from './components/footer.vue';

const route = useRoute();
const showNavbar = computed(() => !route.meta.hideNavbar);
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

