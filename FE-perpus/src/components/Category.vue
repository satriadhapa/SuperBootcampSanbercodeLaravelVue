<template>
  <div class="container">
    <h1 class="title text-4xl font-bold">Daftar Kategori</h1>

    <!-- Error Message -->
    <div v-if="errorMessage" class="error-message">{{ errorMessage }}</div>

    <!-- Category List -->
    <div v-if="categories.length" class="category-list">
      <div v-for="category in categories" :key="category.id" class="category-card">
        <h2 class="category-name">{{ category.name }}</h2>
        <div class="category-actions" v-if="isOwner">
          <button class="btn btn-secondary" @click="editCategory(category)">Edit</button>
          <button class="btn btn-danger" @click="deleteCategory(category.id)">Delete</button>
        </div>
      </div>
    </div>
    <div v-else>
      <p class="text-center">No categories available.</p>
    </div>

    <!-- Button to Add New Category -->
    <div v-if="isOwner">
      <button class="btn btn-primary" @click="showCreateModal = true">Add New Category</button>
    </div>

    <!-- Create Category Modal -->
    <transition name="fade">
      <div v-if="showCreateModal && isOwner" class="modal">
        <div class="modal-content">
          <h3>Create Category</h3>
          <form @submit.prevent="createCategory" class="form">
            <label for="name">Name:</label>
            <input type="text" v-model="newCategory.name" required />
            <span v-if="nameError" class="error-message">{{ nameError }}</span>
            <button type="submit" class="btn btn-primary" :disabled="isSubmitting">Save</button>
            <button type="button" class="btn btn-secondary" @click="showCreateModal = false">Cancel</button>
          </form>
        </div>
      </div>
    </transition>

    <!-- Edit Category Modal -->
    <transition name="fade">
      <div v-if="showEditModal && isOwner" class="modal">
        <div class="modal-content">
          <h3>Edit Category</h3>
          <form @submit.prevent="updateCategory" class="form">
            <label for="name">Name:</label>
            <input type="text" v-model="currentCategory.name" required />
            <span v-if="nameError" class="error-message">{{ nameError }}</span>
            <button type="submit" class="btn btn-primary" :disabled="isSubmitting">Update</button>
            <button type="button" class="btn btn-secondary" @click="showEditModal = false">Cancel</button>
          </form>
        </div>
      </div>
    </transition>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import apiClient from '@/api/axios.js';

const categories = ref([]);
const newCategory = ref({ name: '' });
const currentCategory = ref({});
const showCreateModal = ref(false);
const showEditModal = ref(false);
const isOwner = ref(false);
const errorMessage = ref('');
const nameError = ref('');
const isSubmitting = ref(false);

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

const createCategory = async () => {
  if (!isOwner.value) {
    errorMessage.value = 'Unauthorized operation.';
    return;
  }

  if (!newCategory.value.name) {
    nameError.value = 'Category name is required.';
    return;
  }

  isSubmitting.value = true;
  try {
    await apiClient.post('/categories', newCategory.value);
    fetchCategories();
    showCreateModal.value = false;
    newCategory.value.name = '';
    nameError.value = '';
  } catch (error) {
    errorMessage.value = 'Error creating category.';
  } finally {
    isSubmitting.value = false;
  }
};

const editCategory = (category) => {
  if (!isOwner.value) {
    errorMessage.value = 'Unauthorized operation.';
    return;
  }

  currentCategory.value = { ...category };
  showEditModal.value = true;
};

const updateCategory = async () => {
  if (!isOwner.value) {
    errorMessage.value = 'Unauthorized operation.';
    return;
  }

  if (!currentCategory.value.name) {
    nameError.value = 'Category name is required.';
    return;
  }

  isSubmitting.value = true;
  try {
    await apiClient.put(`/categories/${currentCategory.value.id}`, currentCategory.value);
    fetchCategories();
    showEditModal.value = false;
    nameError.value = '';
  } catch (error) {
    errorMessage.value = 'Error updating category.';
  } finally {
    isSubmitting.value = false;
  }
};

const deleteCategory = async (categoryId) => {
  if (!isOwner.value) {
    errorMessage.value = 'Unauthorized operation.';
    return;
  }

  try {
    await apiClient.delete(`/categories/${categoryId}`);
    fetchCategories();
  } catch (error) {
    errorMessage.value = 'Error deleting category.';
  }
};

onMounted(() => {
  fetchCategories();
  checkIsOwner();
});
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
  transition: background-color 0.3s, box-shadow 0.3s;
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

.btn-primary:hover {
  background-color: #0056b3;
}

.btn-secondary:hover {
  background-color: #5a6268;
}

.btn-danger:hover {
  background-color: #c82333;
}

.error-message {
  color: red;
  text-align: center;
  margin-bottom: 20px;
}

.category-list {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 20px;
}

.category-card {
  background-color: white;
  padding: 15px;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.category-name {
  font-size: 1.2em;
  margin-bottom: 10px;
}

.category-actions {
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
  transition: transform 0.3s ease;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter, .fade-leave-to {
  opacity: 0;
}

.form {
  display: flex;
  flex-direction: column;
}

.form label {
  margin: 10px 0 5px;
}

.form input {
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}
</style>
