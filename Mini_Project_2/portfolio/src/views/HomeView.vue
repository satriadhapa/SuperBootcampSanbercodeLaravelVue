<template>
  <div class="container mx-auto p-6 text-center animate__animated animate__fadeIn">
    <img src="@/assets/profile.jpg" alt="Profile" class="w-40 h-40 rounded-full mx-auto mb-4">
    <h1 class="text-3xl font-bold mb-4 text-gray-800">Welcome to My Portfolio</h1>
    <p class="text-lg text-gray-600">Hello! I am Moch Satria Dhapa Hamdani</p>
    <p class="text-lg text-gray-600">a passionate data science and web development.</p>
  </div>

  <div class="text-center mb-8">
      <div class="flex justify-center space-x-4">
        <a href="https://github.com/satriadhapa" target="_blank" class="text-gray-600 hover:text-gray-900">
          <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 0C5.373 0 0 5.373 0 12c0 5.303 3.438 9.8 8.207 11.385.6.11.793-.261.793-.577 0-.285-.01-1.04-.015-2.04-3.338.725-4.042-1.614-4.042-1.614C4.422 17.43 3.633 17.1 3.633 17.1c-1.087-.744.084-.729.084-.729 1.204.084 1.837 1.237 1.837 1.237 1.07 1.833 2.809 1.303 3.495.996.107-.775.418-1.303.762-1.603-2.665-.304-5.466-1.333-5.466-5.931 0-1.311.469-2.382 1.236-3.222-.124-.304-.536-1.527.117-3.181 0 0 1.008-.322 3.3 1.231A11.491 11.491 0 0112 5.803c1.02.005 2.045.138 3.003.404 2.291-1.554 3.296-1.231 3.296-1.231.656 1.654.244 2.877.12 3.181.77.84 1.235 1.911 1.235 3.222 0 4.61-2.805 5.623-5.477 5.921.43.372.813 1.102.813 2.222 0 1.605-.015 2.898-.015 3.293 0 .318.19.694.8.576C20.565 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
          </svg>
        </a>
        <a href="https://www.linkedin.com/in/moch-satria-dhapa-hamdani-918880205/" target="_blank" class="text-gray-600 hover:text-gray-900">
          <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path d="M19 0h-14c-2.8 0-5 2.2-5 5v14c0 2.8 2.2 5 5 5h14c2.8 0 5-2.2 5-5v-14c0-2.8-2.2-5-5-5zM8 20h-3v-11h3v11zM6.5 7.5c-.9 0-1.5-.6-1.5-1.5s.6-1.5 1.5-1.5 1.5.6 1.5 1.5-.6 1.5-1.5 1.5zM20 20h-3v-5.5c0-1.3-.5-2.5-1.5-2.5s-1.5 1.2-1.5 2.5v5.5h-3v-11h3v1.4c.4-.8 1.6-1.4 2.5-1.4 1.9 0 3.5 1.6 3.5 3.5v7.5z"/>
          </svg>
        </a>
        <a href="mailto:satriadhapa10@gmail.com" class="text-gray-600 hover:text-gray-900">
          <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 13.2l8.8-6.4h-17.6l8.8 6.4zm0 1.6l-8.8-6.4v10.8h17.6v-10.8l-8.8 6.4z"/>
          </svg>
        </a>
      </div>
      <br>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
      <img src="@/assets/datascience.jpg" alt="Image 1" class="rounded-lg shadow-lg">
      <img src="@/assets/web2.webp" alt="Image 2" class="rounded-lg shadow-lg">
      <img src="@/assets/analisis.jpg" alt="Image 3" class="rounded-lg shadow-lg">
    </div>
    </div>
</template>
<script setup>

</script>


<style scoped>
@import 'animate.css';
.container {
  max-width: 100%;
  padding-left: 1rem;
  padding-right: 1rem;
}

@media (min-width: 768px) {
  .container {
    max-width: 50%;
  }
}

@media (min-width: 1024px) {
  .container {
    max-width: 30%;
  }
}
</style>
