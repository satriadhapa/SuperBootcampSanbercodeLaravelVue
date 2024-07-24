<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg">
      <h2 class="text-2xl font-bold mb-4">Verify Account</h2>
      <form @submit.prevent="verifyAccount">
        <div class="mb-4">
          <label for="otp" class="block text-gray-700">OTP Code</label>
          <input type="text" id="otp" v-model="otp" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Verify</button>
      </form>
      <div v-if="otpFromDatabase" class="mt-4">
        <p>Your OTP Code is: <span class="font-bold">{{ otpFromDatabase }}</span></p>
      </div>
    </div>
  </div>
  <div v-if="showSuccessPopup" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
      <h2 class="text-2xl font-bold mb-4">Verification Successful</h2>
      <p class="mb-4">Your account has been verified successfully.</p>
      <button @click="redirectToLogin" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Go to Login</button>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';

const otp = ref('');
const otpFromDatabase = ref('');
const showSuccessPopup = ref(false);
const store = useStore();
const router = useRouter();

const verifyAccount = async () => {
  try {
    await store.dispatch('verifyAccount', { otp: otp.value });
    otpFromDatabase.value = otp.value; // Assign the OTP from the database to otpFromDatabase
    showSuccessPopup.value = true; // Show the success popup
  } catch (error) {
    console.error(error);
  }
};

const redirectToLogin = () => {
  showSuccessPopup.value = false;
  router.push('/login');
};
</script>
