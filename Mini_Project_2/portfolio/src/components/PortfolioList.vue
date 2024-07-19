<template>
  <div class="container mx-auto p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div v-for="(item, index) in portfolioItems" :key="index" class="bg-white p-4 shadow-lg rounded-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
        <img :src="item.image" alt="Project Image" class="w-full h-48 object-cover mb-4 rounded-md">
        <h2 class="text-xl font-bold mb-2">{{ item.name }}</h2>
        <p class="text-gray-600 mb-2">{{ item.description }}</p>
        <a :href="item.link" target="_blank" class="text-blue-500 hover:underline">View Project</a>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import project1 from '@/assets/datascience.jpg';
import project2 from '@/assets/data analis project.png';
import project3 from '@/assets/postman.png';
import project4 from '@/assets/Customer Churn Prediction.png';

const portfolioItems = ref([
  { 
    name: 'Model Machine Learning', 
    description: 'This machine learning model aims to classify hate speech in the Twitter comments column using the Long Short Term Memory algorithm. In testing this model, deployment was carried out using Gradio', 
    link: 'https://github.com/satriadhapa/Model-Machine-Learning',
    image: project1
  },
  { 
    name: 'Laporan Bencana Alam dan kerusakan Ekonomi', 
    description: 'dashboard is a visualization tool that presents information related to natural disasters and their economic impacts. This dashboard may include data such as the number of natural disasters that have occurred, the location of the disaster, the economic losses caused, as well as possible factors causing disasters such as earthquakes', 
    link: 'https://lookerstudio.google.com/u/0/reporting/014bc9c6-0d37-4d70-93a1-bb7fc6eeefdc/page/DxDhD',
    image: project2
  },
  { 
    name: 'Project Web Development Laravel', 
    description: 'This film review project is a postman documentation in which there is backend logic that runs on a film review application.', 
    link: 'https://documenter.getpostman.com/view/36502041/2sA3XY6dfE',
    image: project3
  },
  { 
    name: 'Model Machine Learning Customer Churn', 
    description: 'This machine learning model is the result of practical work carried out at the Achmad Zaky Foundation. This machine learning model aims to predict customer churn based on the length of time they shop and how much customers spend on a particular item', 
    link: 'https://github.com/satriadhapa/Model-Machine-Learning/blob/master/Project%20KP.ipynb',
    image: project4
  },
]);
</script>

<style scoped>
</style>
