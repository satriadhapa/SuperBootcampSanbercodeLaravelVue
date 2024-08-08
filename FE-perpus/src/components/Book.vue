<template>
    <div>
      <h1 class="text-2xl font-bold mb-4">Books</h1>
      <div v-if="errorMessage" class="text-red-500 mb-4">{{ errorMessage }}</div>
      <div v-if="books.length === 0" class="text-gray-500">No books available.</div>
      <div v-if="isOwner" class="mb-4">
        <button @click="showCreateModal = true" class="bg-blue-500 text-white px-4 py-2 rounded">Add Book</button>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <div v-for="book in books" :key="book.id" class="border p-4 rounded">
          <img v-if="book.image" :src="book.image" alt="Book Image" class="w-full h-48 object-cover mb-4">
          <h2 class="text-lg font-semibold mb-2">{{ book.title }}</h2>
          <p class="text-gray-700 mb-2">{{ book.summary }}</p>
          <p class="text-gray-500">Stok: {{ book.stok }}</p>
          <div v-if="isOwner">
            <button @click="editBook(book)" class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">Edit</button>
            <button @click="deleteBook(book.id)" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
          </div>
        </div>
      </div>
  
      <!-- Create Book Modal -->
      <div v-if="showCreateModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
          <h2 class="text-xl font-bold mb-4">Add Book</h2>
          <form @submit.prevent="createBook">
            <div class="mb-4">
              <label for="title" class="block text-sm font-medium mb-1">Title</label>
              <input v-model="newBook.title" id="title" type="text" class="w-full border border-gray-300 p-2 rounded"/>
            </div>
            <div class="mb-4">
              <label for="summary" class="block text-sm font-medium mb-1">Summary</label>
              <textarea v-model="newBook.summary" id="summary" rows="4" class="w-full border border-gray-300 p-2 rounded"></textarea>
            </div>
            <div class="mb-4">
              <label for="stok" class="block text-sm font-medium mb-1">Stok</label>
              <input v-model="newBook.stok" id="stok" type="number" class="w-full border border-gray-300 p-2 rounded"/>
            </div>
            <div class="mb-4">
              <label for="category_id" class="block text-sm font-medium mb-1">Category</label>
              <select v-model="newBook.category_id" id="category_id" class="w-full border border-gray-300 p-2 rounded">
                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
              </select>
            </div>
            <div class="mb-4">
              <label for="image" class="block text-sm font-medium mb-1">Image</label>
              <input @change="handleImageUpload" id="image" type="file" class="w-full border border-gray-300 p-2 rounded"/>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
            <button type="button" @click="showCreateModal = false" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
          </form>
        </div>
      </div>
  
      <!-- Edit Book Modal -->
      <div v-if="showEditModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
          <h2 class="text-xl font-bold mb-4">Edit Book</h2>
          <form @submit.prevent="updateBook">
            <div class="mb-4">
              <label for="edit-title" class="block text-sm font-medium mb-1">Title</label>
              <input v-model="currentBook.title" id="edit-title" type="text" class="w-full border border-gray-300 p-2 rounded"/>
            </div>
            <div class="mb-4">
              <label for="edit-summary" class="block text-sm font-medium mb-1">Summary</label>
              <textarea v-model="currentBook.summary" id="edit-summary" rows="4" class="w-full border border-gray-300 p-2 rounded"></textarea>
            </div>
            <div class="mb-4">
              <label for="edit-stok" class="block text-sm font-medium mb-1">Stok</label>
              <input v-model="currentBook.stok" id="edit-stok" type="number" class="w-full border border-gray-300 p-2 rounded"/>
            </div>
            <div class="mb-4">
              <label for="edit-category_id" class="block text-sm font-medium mb-1">Category</label>
              <select v-model="currentBook.category_id" id="edit-category_id" class="w-full border border-gray-300 p-2 rounded">
                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
              </select>
            </div>
            <div class="mb-4">
              <label for="edit-image" class="block text-sm font-medium mb-1">Image</label>
              <input @change="handleEditImageUpload" id="edit-image" type="file" class="w-full border border-gray-300 p-2 rounded"/>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
            <button type="button" @click="showEditModal = false" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
          </form>
        </div>
      </div>
    </div>
</template>
  
<script setup>
import { ref, onMounted } from 'vue';
import apiClient from '../api/axios.js';

const books = ref([]);
const categories = ref([]);
const errorMessage = ref('');
const showCreateModal = ref(false);
const showEditModal = ref(false);
const newBook = ref({
  title: '',
  summary: '',
  stok: 0,
  category_id: 0,
  image: null
});
const currentBook = ref({
  id: null,
  title: '',
  summary: '',
  stok: 0,
  category_id: 0,
  image: null
});
const isOwner = ref(false);

const fetchBooks = async () => {
  try {
    const response = await apiClient.get('/books');
    books.value = response.data;
  } catch (error) {
    errorMessage.value = 'Error fetching books.';
  }
};

const fetchCategories = async () => {
  try {
    const response = await apiClient.get('/categories');
    categories.value = response.data;
  } catch (error) {
    errorMessage.value = 'Error fetching categories.';
  }
};

const checkIsOwner = () => {
  const userRole = localStorage.getItem('role');
  if (userRole === 'owner') {
    isOwner.value = true;
  }
};

const createBook = async () => {
  try {
    const formData = new FormData();
    formData.append('title', newBook.value.title);
    formData.append('summary', newBook.value.summary);
    formData.append('stok', newBook.value.stok);
    formData.append('category_id', newBook.value.category_id);
    if (newBook.value.image) {
      formData.append('image', newBook.value.image);
    }

    console.log('FormData before sending:', Object.fromEntries(formData.entries())); // Log formData

    const response = await apiClient.post('/books', formData);
    console.log('Response:', response); // Log the response

    fetchBooks();
    showCreateModal.value = false;
  } catch (error) {
    console.error('Error response:', error.response); // Log the error response
    if (error.response && error.response.data) {
      errorMessage.value = `Error creating book: ${JSON.stringify(error.response.data.errors)}`;
    } else {
      errorMessage.value = 'Error creating book.';
    }
  }
};

const editBook = (book) => {
  currentBook.value = { ...book };
  showEditModal.value = true;
};

const updateBook = async () => {
  try {
    const formData = new FormData();
    formData.append('title', currentBook.value.title);
    formData.append('summary', currentBook.value.summary);
    formData.append('stok', currentBook.value.stok);
    formData.append('category_id', currentBook.value.category_id);
    if (currentBook.value.image instanceof File) {
      formData.append('image', currentBook.value.image);
    }
    await apiClient.put(`/books/${currentBook.value.id}`, formData);
    fetchBooks();
    showEditModal.value = false;
  } catch (error) {
    if (error.response && error.response.data) {
      errorMessage.value = `Error updating book: ${JSON.stringify(error.response.data.errors)}`;
    } else {
      errorMessage.value = 'Error updating book.';
    }
  }
};

const deleteBook = async (id) => {
  try {
    await apiClient.delete(`/books/${id}`);
    mm
    fetchBooks();
  } catch (error) {
    errorMessage.value = 'Error deleting book.';
  }
};

const handleImageUpload = (event) => {
  newBook.value.image = event.target.files[0];
};

const handleEditImageUpload = (event) => {
  currentBook.value.image = event.target.files[0];
};

onMounted(() => {
  fetchBooks();
  fetchCategories();
  checkIsOwner();
});
</script>
