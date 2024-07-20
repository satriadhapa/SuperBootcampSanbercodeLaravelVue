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
      <h2 class="text-4xl font-bold mb-6 text-gray-800 text-center">Certifications</h2>
      <div class="timeline">
        <div class="timeline-item" v-for="(item, index) in certificationItems" :key="index">
          <div class="timeline-icon">
            <svg class="w-3 h-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <div class="timeline-content">
            <h2 class="text-xl font-bold mb-1">{{ item.name }}</h2>
            <p class="text-gray-600 mb-2">{{ item.issuer }}</p>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
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
      description: "•	pengolahan data sebanyak 15000+",
      description2: "•	Berhasil Mengerjakan proyek akhir model customer churn dengan akurasi 85%",
      description3: "•	Melakukan A/B test untuk menguji performa dari beberapa algoritma seperti logistic regression dan Random Forest",
      description4: "•	Melakukan Scraping Data sebanyak lebih dari 10000 dengan menggunakan python dan google colab"
    },
    {
      position: 'BackEnd Engineer Laravel',
      company: 'PPK ORMAWA Desa Nagrak Selatan, Kab. Sukabumi',
      duration: 'Agustus 2022 - Januari 2023',
      description: "•	management route untuk setiap fitur pada website nagrak selatan sebanyak lebih dari 5 fitur",
      description2: "•	membuat 5 desain fitur pada database mysql",
      description3: "•	melakukan survei pada 5 tempat UMKM di nagrak selatan",
    },
    
  ]);
  
  const certificationItems = ref([
    {
      name: 'Memproses Data dari Kotor ke Bersih',
      issuer: 'Coursera',
    },
    {
      name: 'Memproses Data dari Kotor ke Bersih',
      issuer: 'Coursera',
    },
    // Add more certification items here
  ]);
  </script>
  
  <style scoped>
  @import 'animate.css';

  
  hr{
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
  