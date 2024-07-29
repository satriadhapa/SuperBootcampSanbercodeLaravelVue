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
    user: JSON.parse(localStorage.getItem('user')) || {},
    profile: {},
    isRegistering: false,
    genres: [],
    casts: [],
    films: [],
  },
  mutations: {
    SET_TOKEN(state, token) {
      state.token = token;
    },
    SET_PROFILE(state, profile) {
      state.profile = profile;
    },
    SET_USER(state, user) {
      state.user = user;
      localStorage.setItem('user', JSON.stringify(user)); // Update localStorage
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
    SET_CASTS(state, casts) {
      
      state.casts = casts;
    },
    SET_MOVIES(state, movies) { // Add SET_MOVIES mutation
      state.movies = movies;
    },
    ADD_MOVIE(state, movie) { // Add ADD_MOVIE mutation
      state.movies.push(movie);
    },
    UPDATE_MOVIE(state, updatedMovie) { // Add UPDATE_MOVIE mutation
      const index = state.movies.findIndex(movie => movie.id === updatedMovie.id);
      if (index !== -1) {
        state.movies.splice(index, 1, updatedMovie);
      }
    },
    DELETE_MOVIE(state, movieId) { // Add DELETE_MOVIE mutation
      state.movies = state.movies.filter(movie => movie.id !== movieId);
    }
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
    async updateProfile({ commit }, profileData) {
      try {
        const response = await axios.post('/update-user', profileData);
        commit('SET_PROFILE', response.data.user);
        commit('SET_USER', response.data.user); // Update user state
      } catch (error) {
        console.error('Failed to update profile:', error);
        throw error;
      }
    },
    async fetchProfile({ commit }) {
      try {
        const response = await axios.post('/get-profile');
        commit('SET_PROFILE', response.data.data);
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
    async fetchCasts({ commit }) { 
      const response = await axios.get('/cast');
      const casts = response.data.data;

      commit('SET_CASTS', casts);
    },
    async createGenre({ dispatch }, genre) {
      try {
        await axios.post('/genre', genre);
        dispatch('fetchGenres');
      } catch (error) {
        console.error('Error creating genre:', error);
        throw error;
      }
    },
    async createCast({ dispatch }, cast) {
      try {
        await axios.post('/cast', cast);
        dispatch('fetchCasts');
      } catch (error) {
        console.error('Error creating cast:', error);
        throw error;
      }
    },
    async updateGenre({ dispatch }, genre) {
      try {
        await axios.put(`/genre/${genre.id}`, genre);
        dispatch('fetchGenres');
      } catch (error) {
        console.error('Error updating genre:', error);
        throw error;
      }
    },
    async fetchCasts({ commit }) {
      const response = await axios.get('/cast');
      const casts = response.data.data;
      commit('SET_CASTS', casts);
    },
    async createCast({ dispatch }, cast) {
      try {
        await axios.post('/cast', cast);
        dispatch('fetchCasts');
      } catch (error) {
        console.error('Error creating cast:', error);
        throw error;
      }
    },
    async updateCast({ dispatch }, cast) {
      try {
        await axios.put(`/cast/${cast.id}`, cast);
        dispatch('fetchCasts');
      } catch (error) {
        console.error('Error updating cast:', error);
        throw error;
      }
    },
    async deleteCast({ dispatch }, id) {
      try {
        await axios.delete(`/cast/${id}`);
        dispatch('fetchCasts');
      } catch (error) {
        console.error('Error deleting cast:', error);
        throw error;
      }
    },
    async fetchMovies({ commit }) { // Fetch movies action
      const response = await axios.get('/movies');
      commit('SET_MOVIES', response.data.data);
    },
    async createMovie({ commit }, movieData) { // Create movie action
      const response = await axios.post('/movies', movieData);
      commit('ADD_MOVIE', response.data.data);
    },
    async updateMovie({ commit }, movieData) { // Update movie action
      const response = await axios.put(`/movies/${movieData.id}`, movieData);
      commit('UPDATE_MOVIE', response.data.data);
    },
    async deleteMovie({ commit }, movieId) { // Delete movie action
      await axios.delete(`/movies/${movieId}`);
      commit('DELETE_MOVIE', movieId);
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
    casts: state => state.casts,
    movies: state => state.movies,
  },
});

export default store;