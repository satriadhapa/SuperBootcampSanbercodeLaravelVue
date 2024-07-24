<template>
  <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm">
      <h2 class="text-2xl font-bold mb-4">Verify Account</h2>
      <form @submit.prevent="verifyOtp">
        <div class="mb-4">
          <label for="otp" class="block text-gray-700">Enter OTP Code</label>
          <input
            v-model="otp"
            type="text"
            id="otp"
            class="mt-1 p-2 w-full border border-gray-300 rounded"
            placeholder="OTP Code"
          />
        </div>
        <button
          type="submit"
          class="w-full py-2 px-4 bg-indigo-500 text-white rounded hover:bg-indigo-600"
        >
          Verify
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from '@/plugins/axios';

const otp = ref('');
const router = useRouter();

const verifyOtp = async () => {
  try {
    await axios.post('/auth/verifikasi-akun', { otp: otp.value });
    router.push('/login');
  } catch (error) {
    console.error('OTP verification failed:', error);
  }
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
