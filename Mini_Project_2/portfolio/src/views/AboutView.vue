<template>
  <div class="container mx-auto p-6 animate__animated animate__fadeIn">
    <h1 class="text-4xl font-bold mb-6 text-gray-800 text-center">About Me</h1>
    <div class="flex flex-col md:flex-row items-center mb-8">
      <img src="@/assets/profil.jpg" alt="Profile Picture" class="w-60 h-60 rounded-full mb-6 md:mb-0 md:mr-6 shadow-lg">
      <div class="text-lg text-gray-600">
        <p class="mb-4 text-justify">I am a fresh graduate in computer science with a passion for data science and software development. I have experience working as a data scientist intern and I am continuously learning and improving my skills.</p>
        <p class="mb-4 text-justify">During my internship, I worked on various data analysis and machine learning projects that helped me to hone my skills in Python, SQL, and data visualization tools. My experience has taught me the importance of clean and well-organized data in making informed decisions.</p>
        <p class="mb-4 text-justify">My goal is to become a proficient data scientist who can leverage data to drive impactful business decisions. I am particularly interested in applying machine learning algorithms to solve real-world problems and contribute to technological advancements.</p>
      </div>
    </div>
    
    <h2 class="text-3xl font-bold mb-4 text-gray-800 text-center">Skills</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
      <div class="bg-white p-4 shadow-md rounded-lg text-center">
        <img src="@/assets/icons/analyst.png" alt="Data Analysis" class="w-12 h-12 mx-auto mb-2">
        <p class="text-gray-600">Data Analysis</p>
      </div>
      <div class="bg-white p-4 shadow-md rounded-lg text-center">
        <img src="@/assets/icons/machine-learning.png" alt="Machine Learning" class="w-12 h-12 mx-auto mb-2">
        <p class="text-gray-600">Machine Learning</p>
      </div>
      <div class="bg-white p-4 shadow-md rounded-lg text-center">
        <img src="@/assets/icons/web.png" alt="Web Development" class="w-12 h-12 mx-auto mb-2">
        <p class="text-gray-600">Web Development</p>
      </div>
      <div class="bg-white p-4 shadow-md rounded-lg text-center">
        <img src="@/assets/icons/data-science.png" alt="Programming" class="w-12 h-12 mx-auto mb-2">
        <p class="text-gray-600">Data Science</p>
      </div>
    </div>
    
    <h2 class="text-3xl font-bold mb-4 text-gray-800 text-center">Goals</h2>
    <div class="bg-blue-100 p-6 rounded-lg shadow-md mb-8">
      <p class="text-lg text-gray-600 mb-4">In the short term, I aim to gain more experience in data science roles and work on challenging projects that push the boundaries of my skills. Long term, I aspire to lead a team of data scientists and contribute to impactful projects that drive technological advancements.</p>
    </div>
    
    <h2 class="text-3xl font-bold mb-4 text-gray-800 text-center">Inspirational Quotes</h2>
    <div class="bg-gray-100 p-6 rounded-lg shadow-md mb-8">
      <p class="text-lg text-gray-600 mb-4 italic">"The goal is to turn data into information, and information into insight." - Carly Fiorina</p>
      <p class="text-lg text-gray-600 italic">"In God we trust, all others must bring data." - W. Edwards Deming</p>
    </div>
  </div>
</template>

<script setup>
</script>

<style scoped>
@import 'animate.css';

.container {
  max-width: 800px;
}

h1, h2 {
  color: #1a202c;
}

p {
  line-height: 1.6;
}

img {
  object-fit: cover;
}

.shadow-md {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.shadow-lg {
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.rounded-lg {
  border-radius: 0.5rem;
}
</style>
