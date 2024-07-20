<template>
  <div class="container mx-auto p-6 animate__animated animate__fadeIn">
    <h1 class="text-4xl font-bold mb-6 text-gray-800 text-center">Experience</h1>
    
    <div class="timeline">
      <div class="timeline-item" v-for="(item, index) in experienceItems" :key="index">
        <div class="timeline-icon">
          <svg class="w-3 h-3  text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
          </svg>
        </div>
        <div class="timeline-content">
          <h2 class="text-xl font-bold mb-1">{{ item.position }}</h2>
          <p class="text-gray-600 mb-4">{{ item.company }} ({{ item.duration }})</p>
          <p class="text-gray-500">{{ item.description }}</p>
          <p class="text-gray-500">{{ item.description2 }}</p>
          <p class="text-gray-500">{{ item.description3 }}</p>
          <p class="text-gray-500">{{ item.description4 }}</p>
        </div>
      </div>
    </div>
    <hr>
    <br>
  </div>
  <h2 class="text-4xl font-bold mb-6 text-gray-800 text-center">Certifications</h2>
  <div class="container mx-auto p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div v-for="(item, index) in certification" :key="index" class="bg-white p-4 shadow-lg rounded-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
        <a @click.prevent="showImage(item.image)">
          <img :src="item.image" alt="Project Image" class="w-full h-48 object-cover mb-4 rounded-md cursor-pointer">
        </a>
        <h2 class="text-xl font-bold mb-2">{{ item.name }}</h2>
        <p class="text-gray-600 mb-2">{{ item.description }}</p>
        <a :href="item.link" target="_blank" class="text-blue-500 hover:underline">View Certificate</a>
      </div>
    </div>
  </div>
  <vue-easy-lightbox
    :visible="visible"
    :imgs="imgs"
    @hide="handleHide"
  ></vue-easy-lightbox>
</template>

<script setup>
import { ref } from 'vue';
import VueEasyLightbox from 'vue-easy-lightbox';

// Experience Data
const experienceItems = ref([
  {
    position: 'Teknik Informatika',
    company: 'Universitas Muhammadiyah Sukabumi',
    duration: 'September 2020 - Februari 2024',
    description: 'IPK : 3.71',
  },
  {
    position: 'Data Scientist Intern',
    company: 'Yayasan Achmad Zaky',
    duration: 'Agustus 2022 - Desember 2022',
    description: "• Pengolahan data sebanyak 15000+",
    description2: "• Berhasil Mengerjakan proyek akhir model customer churn dengan akurasi 85%",
    description3: "• Melakukan A/B test untuk menguji performa dari beberapa algoritma seperti logistic regression dan Random Forest",
    description4: "• Melakukan Scraping Data sebanyak lebih dari 10000 dengan menggunakan python dan google colab"
  },
  {
    position: 'BackEnd Engineer Laravel',
    company: 'PPK ORMAWA Desa Nagrak Selatan, Kab. Sukabumi',
    duration: 'Agustus 2022 - Januari 2023',
    description: "• Management route untuk setiap fitur pada website nagrak selatan sebanyak lebih dari 5 fitur",
    description2: "• Membuat 5 desain fitur pada database mysql",
    description3: "• Melakukan survei pada 5 tempat UMKM di nagrak selatan",
  },
]);

// Certification Data
import project1 from '@/assets/certification/sertifikat 1.png';
import project2 from '@/assets/certification/sertifikat 2.png';
import project3 from '@/assets/certification/sertifikat 3.png';
import project4 from '@/assets/certification/sertifikat 4.png';
import project5 from '@/assets/certification/sertifikat 5.png';
import project6 from '@/assets/certification/sertifikat 6.png';

const certification = ref([
  { 
    name: 'Introduction to Data Science with Python', 
    description: 'Materi dasar dan lanjutan Python untuk Data Science', 
    link: 'https://academy.dqlab.id/Certificate_check/result/DQLABINTP1NGDAGJ#mycertificate',
    image: project1
  },
  { 
    name: 'Workshop Pemrograman Front End dan Backend Laravel', 
    description: 'Penyelesaian sertifikasi materi dasar laravel', 
    link: 'https://mail.google.com/mail/u/0?ui=2&ik=950cfdd5e8&attid=0.1&permmsgid=msg-f:1741925685014305203&th=182c902e706819b3&view=att&disp=safe&realattid=f_l75p7wld0',
    image: project2
  },
  { 
    name: 'SQL Basic', 
    description: 'Sertifikasi pemahaman materi dasar-dasar sintax SQL', 
    link: 'https://www.hackerrank.com/certificates/ce9a391e13ca',
    image: project3
  },
  { 
    name: 'Machine Learning Untuk Pemula', 
    description: 'Mempelajari dasar-dasar machine learning dan implementasi algoritma machine learning menggunakan google colab', 
    link: 'https://www.dicoding.com/certificates/MEPJEGRQ6X3V',
    image: project4
  },
  { 
    name: 'Sertifikat penyelesaian Program Data Science', 
    description: 'Memproses data, analisis data dan modelling data dengan menggunakan machine learning dalam memprediksi customer churn', 
    link: 'https://startupcampus.id/certificate/KM3-DSD836',
    image: project5
  },
  { 
    name: 'Sertifikat Data Analis', 
    description: 'Menentukan dan menjelaskan konsep utama yang terlibat dalam analitik data termasuk data, analisis data, dan ekosistem data', 
    link: 'https://coursera.org/share/2ec44e124cffb75ff34029cf471074f2',
    image: project6
  },
]);

// Lightbox logic
const visible = ref(false);
const imgs = ref([]);
const showImage = (imgSrc) => {
  imgs.value = [imgSrc];
  visible.value = true;
};
const handleHide = () => {
  visible.value = false;
};
</script>

<style scoped>
@import 'animate.css';

hr {
  border: 2px solid rgb(92, 92, 92);
  border-radius: 5px;
}

.timeline {
  position: relative;
  margin: 1rem 0;
}

.timeline:before {
  content: '';
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 2px;
  height: 100%;
  background: #808080;
}

.timeline-item {
  display: flex;
  align-items: flex-start;
  margin-bottom: 3rem;
  position: relative;
}

.timeline-item:nth-child(even) {
  flex-direction: row-reverse;
}

.timeline-item:nth-child(even) .timeline-content {
  text-align: right;
}

.timeline-item:nth-child(even) .timeline-icon {
  left: auto;
  right: -1rem;
}

.timeline-icon {
  background: white;
  border: 2px solid #cbd5e0;
  border-radius: 50%;
  padding: 0.5rem;
  position: absolute;
  top: 0;
  left: -1rem;
}

.timeline-content {
  background: white;
  border: 1px solid #cbd5e0;
  border-radius: 0.5rem;
  padding: 1rem;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  max-width: 45%;
}

.timeline-content h2 {
  margin-bottom: 0.5rem;
}

.timeline-content p {
  margin-bottom: 0.5rem;
}
</style>
