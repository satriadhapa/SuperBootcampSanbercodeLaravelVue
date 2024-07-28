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
    profile: {},
    isRegistering: false,
    genres: [],
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
      state.profile = {};
    },
    SET_GENRES(state, genres) {
      state.genres = genres;
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
    async fetchGenres({ commit }) {
      const response = await axios.get('/genre');
      const genres = response.data.data;

      commit('SET_GENRES', genres);
    },
    async createGenre({ dispatch }, genre) {
      await axios.post('/genre', genre);
      dispatch('fetchGenres');
    },
    async updateGenre({ dispatch }, genre) {
      await axios.put(`/genre/${genre.id}`, genre);
      dispatch('fetchGenres');
    },
    async deleteGenre({ dispatch }, id) {
      await axios.delete(`/genre/${id}`);
      dispatch('fetchGenres');
    },
      async deleteGenre({ dispatch }, id) {
        await axios.delete(`/genre/${id}`);
        dispatch('fetchGenres');
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
      profile: state => state.profile,
      isRegistering: state => state.isRegistering,
      genres: state => state.genres,
    },
  });
  
  export default store;
  