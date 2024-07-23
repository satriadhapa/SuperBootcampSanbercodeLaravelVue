<template>
  <div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4 text-center">Verifikasi Akun</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
      <form @submit.prevent="verifyAccount">
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="otp">Kode OTP</label>
          <input v-model="otp" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="otp" type="text" />
        </div>
        <div class="flex items-center justify-between">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Verifikasi
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';

const otp = ref('');

const store = useStore();
const router = useRouter();

const verifyAccount = async () => {
  try {
    await store.dispatch('verifyAccount', {
      otp: otp.value,
    });
    router.push('/');
  } catch (error) {
    console.error('Verification failed', error);
  }
};
</script>

<style scoped>
</style>
