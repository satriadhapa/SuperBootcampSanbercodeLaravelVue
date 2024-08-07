import axios from 'axios';

// Membuat instance axios
const apiClient = axios.create({
  baseURL: 'http://localhost:8000/api/v1', // Ganti dengan base URL API Anda
  headers: {
    'Content-Type': 'application/json',
  },
});

// Menambahkan interceptor untuk setiap permintaan
apiClient.interceptors.request.use(config => {
  const token = localStorage.getItem('token'); // Ambil token dari localStorage
  if (token) {
    config.headers.Authorization = `Bearer ${token}`; // Tambahkan Bearer token pada header
  }
  return config;
}, error => {
  return Promise.reject(error);
});

export default apiClient;
