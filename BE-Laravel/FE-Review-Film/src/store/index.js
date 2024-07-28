import { createStore } from 'vuex';
import axios from '@/plugins/axios.js';

function parseJSON(value) {
  try {
    return JSON.parse(value);
  } catch (e) {
    return {};
  }
}

const store = createStore({
  state: {
    token: localStorage.getItem('token') || '',
    user: parseJSON(localStorage.getItem('user')) || {},
    profile: {}, // Add profile to state
    isRegistering: false,
  },
  mutations: {
    SET_TOKEN(state, token) {
      state.token = token;
    },
    SET_USER(state, user) {
      state.user = user;
    },
    SET_PROFILE(state, profile) {
      state.profile = profile;
    },
    SET_REGISTERING(state, status) {
      state.isRegistering = status;
    },
    LOGOUT(state) {
      state.token = '';
      state.user = {};
      state.profile = {}; // Reset profile on logout
    },
  },
  actions: {
    async login({ commit }, credentials) {
      const response = await axios.post('/auth/login', credentials);
      const token = response.data.token;
      const user = response.data.user;

      localStorage.setItem('token', token);
      localStorage.setItem('user', JSON.stringify(user));
      commit('SET_TOKEN', token);
      commit('SET_USER', user);
    },
    async register({ commit }, userData) {
      const response = await axios.post('/auth/register', userData);
      const token = response.data.token;
      const user = response.data.user;

      localStorage.setItem('token', token);
      localStorage.setItem('user', JSON.stringify(user));
      commit('SET_TOKEN', token);
      commit('SET_USER', user);
      commit('SET_REGISTERING', true);
    },
    async verifyAccount({ commit }, otpData) {
      const response = await axios.post('/auth/verifikasi-akun', otpData);
      const updatedUser = response.data.user;

      localStorage.setItem('user', JSON.stringify(updatedUser));
      commit('SET_USER', updatedUser);
      commit('SET_REGISTERING', false);
    },
    async fetchProfile({ commit }) {
      try {
        const response = await axios.post('/get-profile');
        const profile = response.data.data;

        commit('SET_PROFILE', profile);
      } catch (error) {
        console.error('Failed to fetch profile:', error);
      }
    },
    async fetchUser({ commit }) {
      const response = await axios.get('/me');
      const user = response.data.user;

      localStorage.setItem('user', JSON.stringify(user));
      commit('SET_USER', user);
    },
    logout({ commit }) {
      localStorage.removeItem('token');
      localStorage.removeItem('user');
      commit('LOGOUT');
      commit('SET_REGISTERING', false);
    },
  },
  getters: {
    isAuthenticated: state => !!state.token,
    user: state => state.user,
    profile: state => state.profile, // Add getter for profile
    isRegistering: state => state.isRegistering,
  },
});

export default store;
