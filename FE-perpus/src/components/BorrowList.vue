<template>
    <div class="borrow-list">
      <h2 style="text-align: center; font-weight: bold">Daftar Peminjaman Buku</h2>
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Buku</th>
            <th>Nama Peminjam</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Pengembalian</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(borrow, index) in borrows" :key="borrow.id">
            <td>{{ index + 1 }}</td>
            <td>{{ borrow.book.title }}</td>
            <td>{{ borrow.user.name }}</td>
            <td>{{ new Date(borrow.load_date).toLocaleDateString() }}</td>
            <td>{{ new Date(borrow.barrow_date).toLocaleDateString() }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import { ref, onMounted } from 'vue';
  import apiClient from '@/api/axios';
  
  export default {
    name: 'BorrowList',
    setup() {
      const borrows = ref([]);
  
      const fetchBorrows = async () => {
        try {
          const response = await apiClient.get('/borrows');
          borrows.value = response.data;
        } catch (error) {
          console.error('Error fetching borrow data:', error);
        }
      };
  
      onMounted(() => {
        fetchBorrows();
      });
  
      return {
        borrows,
      };
    },
  };
  </script>
  
  <style scoped>
  .borrow-list {
    padding: 16px;
  }
  
  .table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  
  .table th, .table td {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
  .table th {
    background-color: #f2f2f2;
    text-align: left;
  }
  
  .table tr:hover {
    background-color: #f1f1f1;
  }
  </style>
  