<template>
  <div class="container">
    <h1 class="title">Books</h1>
    <button class="btn btn-primary" @click="showCreateModal = true" v-if="isOwner">Add New Book</button>

    <div v-if="errorMessage" class="error-message">{{ errorMessage }}</div>

    <div v-if="books.length" class="book-list">
      <div v-for="book in books" :key="book.id" class="book-card">
        <h2 class="book-title">{{ book.title }}</h2>
        <img v-if="book.image" :src="book.image" alt="Book Image" class="book-image"/>
        <p class="book-summary">{{ book.summary }}</p>
        <p class="book-stock">Stock: {{ book.stok }}</p>
        <p class="book-category">Category: {{ book.category.name }}</p>
        <div class="book-actions" v-if="isOwner">
          <button class="btn btn-secondary" @click="editBook(book)">Edit</button>
          <button class="btn btn-danger" @click="deleteBook(book.id)">Delete</button>
        </div>
      </div>
    </div>

    <!-- Create Book Modal -->
    <div v-if="showCreateModal" class="modal">
      <div class="modal-content">
        <h3>Create Book</h3>
        <form @submit.prevent="createBook" class="form">
          <label for="title">Title:</label>
          <input type="text" v-model="newBook.title" required>
          
          <label for="summary">Summary:</label>
          <textarea v-model="newBook.summary" required></textarea>
          
          <label for="stok">Stock:</label>
          <input type="number" v-model="newBook.stok" required>
          
          <label for="category">Category:</label>
          <select v-model="newBook.category_id" required>
            <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
          </select>
          
          <label for="image">Image:</label>
          <input type="file" @change="handleImageUpload" required>
          
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" @click="showCreateModal = false">Cancel</button>
        </form>
      </div>
    </div>

    <!-- Edit Book Modal -->
    <div v-if="showEditModal" class="modal">
      <div class="modal-content">
        <h3>Edit Book</h3>
        <form @submit.prevent="updateBook" class="form">
          <label for="title">Title:</label>
          <input type="text" v-model="currentBook.title" required>
          
          <label for="summary">Summary:</label>
          <textarea v-model="currentBook.summary" required></textarea>
          
          <label for="stok">Stock:</label>
          <input type="number" v-model="currentBook.stok" required>
          
          <label for="category">Category:</label>
          <select v-model="currentBook.category_id" required>
            <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
          </select>
          
          <label for="image">Image:</label>
          <input type="file" @change="handleEditImageUpload">
          
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-secondary" @click="showEditModal = false">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import apiClient from '@/api/axios.js';

export default {
  name: 'Books',
  setup() {
    const books = ref([]);
    const categories = ref([]);
    const newBook = ref({
      title: '',
      summary: '',
      stok: 0,
      category_id: null,
      image: null
    });
    const currentBook = ref({});
    const showCreateModal = ref(false);
    const showEditModal = ref(false);
    const isOwner = ref(false);
    const errorMessage = ref('');

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
      isOwner.value = userRole === 'owner';
    };

    const createBook = async () => {
      if (!isOwner.value) {
        errorMessage.value = 'Unauthorized operation.';
        return;
      }

      try {
        const formData = new FormData();
        formData.append('title', newBook.value.title);
        formData.append('summary', newBook.value.summary);
        formData.append('stok', newBook.value.stok);
        formData.append('category_id', newBook.value.category_id);
        if (newBook.value.image) {
          formData.append('image', newBook.value.image);
        }
        await apiClient.post('/books', formData);
        fetchBooks();
        showCreateModal.value = false;
      } catch (error) {
        if (error.response && error.response.data) {
          const errors = error.response.data.errors;
          errorMessage.value = `Error creating book: ${Object.values(errors).map(err => err.join(', ')).join(', ')}`;
        } else {
          errorMessage.value = 'Error creating book.';
        }
      }
    };

    const editBook = (book) => {
      if (!isOwner.value) {
        errorMessage.value = 'Unauthorized operation.';
        return;
      }

      currentBook.value = { ...book };
      showEditModal.value = true;
    };

    const updateBook = async () => {
      if (!isOwner.value) {
        errorMessage.value = 'Unauthorized operation.';
        return;
      }

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
          const errors = error.response.data.errors;
          errorMessage.value = `Error updating book: ${Object.values(errors).map(err => err.join(', ')).join(', ')}`;
        } else {
          errorMessage.value = 'Error updating book.';
        }
      }
    };

    const deleteBook = async (bookId) => {
      if (!isOwner.value) {
        errorMessage.value = 'Unauthorized operation.';
        return;
      }

      try {
        await apiClient.delete(`/books/${bookId}`);
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

    return {
      books,
      categories,
      newBook,
      currentBook,
      showCreateModal,
      showEditModal,
      isOwner,
      errorMessage,
      fetchBooks,
      createBook,
      editBook,
      updateBook,
      deleteBook,
      handleImageUpload,
      handleEditImageUpload
    };
  }
};
</script>

<style scoped>
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 8px;
}

.title {
  text-align: center;
  margin-bottom: 20px;
}

.btn {
  margin: 5px;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn-primary {
  background-color: #007bff;
  color: white;
}

.btn-secondary {
  background-color: #6c757d;
  color: white;
}

.btn-danger {
  background-color: #dc3545;
  color: white;
}

.error-message {
  color: red;
  text-align: center;
  margin-bottom: 20px;
}

.book-list {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 20px;
}

.book-card {
  background-color: white;
  padding: 15px;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.book-title {
  font-size: 1.2em;
  margin-bottom: 10px;
}

.book-summary {
  font-size: 0.9em;
  margin-bottom: 10px;
}

.book-stock,
.book-category {
  font-size: 0.8em;
  margin-bottom: 5px;
}

.book-image {
  width: 100%;
  height: auto;
  margin-bottom: 10px;
}

.book-actions {
  display: flex;
  justify-content: space-around;
}

.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
}

.modal-content {
  background: white;
  padding: 20px;
  border-radius: 8px;
  width: 80%;
  max-width: 500px;
}

.form {
  display: flex;
  flex-direction: column;
}

.form label {
  margin: 10px 0 5px;
}

.form input,
.form textarea,
.form select {
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}
</style>
