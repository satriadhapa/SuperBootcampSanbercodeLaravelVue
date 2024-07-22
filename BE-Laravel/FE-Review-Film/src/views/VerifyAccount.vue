<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
      <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <h1 class="text-2xl font-bold mb-6 text-center">Verify Your Account</h1>
        <form @submit.prevent="handleVerify">
          <div class="mb-4">
            <label for="verification-code" class="block text-sm font-medium text-gray-700 mb-1">Verification Code</label>
            <input
              id="verification-code"
              v-model="verificationCode"
              type="text"
              placeholder="Enter your verification code"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
              required
            />
          </div>
          <button
            type="submit"
            class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            Verify
          </button>
          <p class="mt-4 text-sm text-center">
            Didn't receive a code? 
            <a href="#" class="text-blue-500 hover:underline">Resend Code</a>
          </p>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const verificationCode = ref('');
  
  const handleVerify = () => {
    // Handle verification logic here
    console.log('Verification Code:', verificationCode.value);
  };
  </script>
  
  <style scoped>
  /* Tambahkan styling tambahan sesuai kebutuhan */
  </style>
  