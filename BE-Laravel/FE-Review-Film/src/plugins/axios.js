import axios from 'axios';

const instance = axios.create({
  baseURL: 'http://localhost:8000/api/v1', // Sesuaikan dengan base URL API Laravel Anda
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
  },
});

instance.interceptors.request.use((config) => {
  const token = localStorage.getItem('token');
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
});

export default instance;
