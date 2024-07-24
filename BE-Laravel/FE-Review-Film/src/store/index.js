import { createStore } from 'vuex';
import axios from '@/plugins/axios';  

const store = createStore({
  state: {
    token: localStorage.getItem('token') || '',
    user: localStorage.getItem('user') ? JSON.parse(localStorage.getItem('user')) : {}, // Check if user exists in localStorage before parsing
  },
  mutations: {
    SET_TOKEN(state, token) {
      state.token = token;
    },
    SET_USER(state, user) {
      state.user = user;
    },
    LOGOUT(state) {
      state.token = '';
      state.user = {};
    },
  },
  actions: {
    async login({ commit }, credentials) {
      const response = await axios.post('/auth/login', credentials);
      const token = response.data.token;
      const user = response.data.user;

      localStorage.setItem('token', token);
      localStorage.setItem('user', JSON.stringify(user)); // Store user in localStorage
      commit('SET_TOKEN', token);
      commit('SET_USER', user);
    },
    async register({ commit }, userData) {
      const response = await axios.post('/auth/register', userData);
      const token = response.data.token;
      const user = response.data.user;

      localStorage.setItem('token', token);
      localStorage.setItem('user', JSON.stringify(user)); // Store user in localStorage
      commit('SET_TOKEN', token);
      commit('SET_USER', user);
    },
    async verifyAccount({ commit }, otpData) {
      const response = await axios.post('/auth/verifikasi-akun', otpData);
      
      const updatedUser = response.data.user; 
      localStorage.setItem('user', JSON.stringify(updatedUser)); // Update user in localStorage
      commit('SET_USER', updatedUser);
    },
    async fetchUser({ commit }) {
      const response = await axios.get('/me');
      const user = response.data.user;

      localStorage.setItem('user', JSON.stringify(user)); // Store user in localStorage
      commit('SET_USER', user);
    },
    logout({ commit }) {
      localStorage.removeItem('token');
      localStorage.removeItem('user'); // Remove user from localStorage
      commit('LOGOUT');
    },
  },
  getters: {
    isAuthenticated: state => !!state.token,
    user: state => state.user,
  },
});

export default store;
