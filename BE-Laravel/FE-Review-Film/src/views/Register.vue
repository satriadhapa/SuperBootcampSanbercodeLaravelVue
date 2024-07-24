<template>
  <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm">
      <h2 class="text-2xl font-bold mb-4">Register</h2>
      <form @submit.prevent="register">
        <div class="mb-4">
          <label for="name" class="block text-gray-700">Name</label>
          <input
            v-model="name"
            type="text"
            id="name"
            class="mt-1 p-2 w-full border border-gray-300 rounded"
            placeholder="Your Name"
          />
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700">Email</label>
          <input
            v-model="email"
            type="email"
            id="email"
            class="mt-1 p-2 w-full border border-gray-300 rounded"
            placeholder="Your Email"
          />
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-700">Password</label>
          <input
            v-model="password"
            type="password"
            id="password"
            class="mt-1 p-2 w-full border border-gray-300 rounded"
            placeholder="Your Password"
          />
        </div>
        <div class="mb-4">
          <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
          <input
            v-model="passwordConfirmation"
            type="password"
            id="password_confirmation"
            class="mt-1 p-2 w-full border border-gray-300 rounded"
            placeholder="Confirm Your Password"
          />
        </div>
        <button
          type="submit"
          class="w-full py-2 px-4 bg-indigo-500 text-white rounded hover:bg-indigo-600"
        >
          Register
        </button>
      </form>
    </div>

    <!-- OTP Popup Notification -->
    <div v-if="showOtpPopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h3 class="text-lg font-semibold mb-4">OTP Code Sent!</h3>
        <p class="mb-4">An OTP code has been sent to your email address. Please check your email and verify your account.</p>
        <button @click="redirectToVerifyAccount" class="py-2 px-4 bg-indigo-500 text-white rounded hover:bg-indigo-600">
          OK
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from '@/plugins/axios';

const name = ref('');
const email = ref('');
const password = ref('');
const passwordConfirmation = ref('');
const showOtpPopup = ref(false);
const router = useRouter();

const register = async () => {
  try {
    const response = await axios.post('/auth/register', {
      name: name.value,
      email: email.value,
      password: password.value,
      password_confirmation: passwordConfirmation.value,
    });

    if (response.data.message === 'register berhasil') {
      showOtpPopup.value = true;
      setTimeout(() => {
        router.push('/verify-account');
      }, 2000); // Redirect after 2 seconds
    }
  } catch (error) {
    console.error('Registration failed:', error);
  }
};

const redirectToVerifyAccount = () => {
  router.push('/verify-account');
};
</script> 
<style scoped>
.popup {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}
</style>
