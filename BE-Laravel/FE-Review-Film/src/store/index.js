import { createStore } from 'vuex';
import axios from '@/plugins/axios';

const store = createStore({
  state: {
    token: localStorage.getItem('token') || '',
    user: {},
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
      commit('SET_TOKEN', token);
      commit('SET_USER', user);
    },
    async register({ commit }, userData) {
      const response = await axios.post('/auth/register', userData);
      const token = response.data.token;
      const user = response.data.user;

      localStorage.setItem('token', token);
      commit('SET_TOKEN', token);
      commit('SET_USER', user);
    },
    async verifyAccount({ commit }, otpData) {
      const response = await axios.post('/auth/verifikasi-akun', otpData);
      // Here you may want to handle the response accordingly, e.g., updating the user status
      // For example, you could refetch the user data if needed.
    },
    logout({ commit }) {
      localStorage.removeItem('token');
      commit('LOGOUT');
    },
  },
  getters: {
    isAuthenticated: state => !!state.token,
    user: state => state.user,
  },
});

export default store;
