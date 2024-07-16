<template>
    <div class="container mx-auto p-6 animate__animated animate__fadeIn">
      <h1 class="text-4xl font-bold mb-6 text-gray-800 text-center">Contact Me</h1>
      <form class="max-w-lg mx-auto">
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
          <input type="text" id="name" class="w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
          <input type="email" id="email" class="w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
          <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
          <textarea id="message" class="w-full p-2 border border-gray-300 rounded"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition">Send Message</button>
      </form>
    </div>
  </template>
  
  <script setup>
  </script>
  
  <style scoped>
  @import 'animate.css';
  </style>
  