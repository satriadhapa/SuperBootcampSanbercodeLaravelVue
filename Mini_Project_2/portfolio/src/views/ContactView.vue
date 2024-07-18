<template>
  <div class="container mx-auto p-6 animate__animated animate__fadeIn">
    <h1 class="text-4xl text-center"> Let's Connect With</h1>
    <h1 class="text-4xl font-bold mb-6 text-gray-800 text-center">Me</h1>
    
    <form class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
      <div class="mb-4">
        <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
        <div class="flex items-center border-b border-gray-300 py-2">
          <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
          </svg>
          <input type="text" id="name" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Your name" v-model="name" required>
        </div>
      </div>
      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
        <div class="flex items-center border-b border-gray-300 py-2">
          <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8-4H8m4 8H8m-4-4h16a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6a1 1 0 011-1z"></path>
          </svg>
          <input type="email" id="email" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Your email" v-model="email" required>
        </div>
      </div>
      <div class="mb-4">
        <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
        <div class="flex items-center border-b border-gray-300 py-2">
          <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-9 4V4a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2h10a2 2 0 002-2V4m-9 8h.01"></path>
          </svg>
          <textarea id="message" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="Your message" v-model="message" required></textarea>
        </div>
      </div>
      <div class="flex justify-center">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition" @click.prevent="submitForm">Send Message</button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const name = ref('');
const email = ref('');
const message = ref('');

const submitForm = () => {
  if (name.value && email.value && message.value) {
    alert('Message sent successfully!');
    name.value = '';
    email.value = '';
    message.value = '';
  } else {
    alert('Please fill in all fields.');
  }
};
</script>

<style scoped>
@import 'animate.css';

form {
  transition: transform 0.3s ease-in-out;
}

form:hover {
  transform: scale(1.02);
}
</style>
