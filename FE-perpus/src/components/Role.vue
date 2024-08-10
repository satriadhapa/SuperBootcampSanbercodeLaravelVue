<script setup>
import { ref, onMounted } from 'vue';
import apiClient from '@/api/axios.js';

const roles = ref([]);
const newRole = ref('');
const editRoleId = ref(null);
const editRoleName = ref('');

const fetchRoles = async () => {
  try {
    const response = await apiClient.get('/roles');
    roles.value = response.data;
  } catch (error) {
    console.error(error);
  }
};

const addRole = async () => {
  try {
    const response = await apiClient.post('/roles', { name: newRole.value });
    roles.value.push(response.data);
    newRole.value = '';
  } catch (error) {
    console.error(error);
  }
};

const startEditing = (role) => {
  editRoleId.value = role.id;
  editRoleName.value = role.name;
};

const saveEdit = async (id) => {
  try {
    const response = await apiClient.put(`/roles/${id}`, { name: editRoleName.value });
    const index = roles.value.findIndex(role => role.id === id);
    roles.value[index] = response.data;
    editRoleId.value = null;
    editRoleName.value = '';
  } catch (error) {
    console.error(error);
  }
};

const deleteRole = async (id) => {
  try {
    await apiClient.delete(`/roles/${id}`);
    roles.value = roles.value.filter(role => role.id !== id);
  } catch (error) {
    console.error(error);
  }
};

onMounted(() => {
  fetchRoles();
});
</script>

<template>
  <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Manage Roles</h1>

    <!-- Form to add new role -->
    <div class="mb-6 flex items-center">
      <input 
        v-model="newRole" 
        placeholder="Enter new role" 
        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
      />
      <button 
        @click="addRole" 
        class="bg-blue-500 text-white px-6 py-2 rounded-lg ml-4 hover:bg-blue-600 transition duration-300"
      >
        Add Role
      </button>
    </div>

    <!-- Table of roles -->
    <table class="min-w-full bg-white rounded-lg overflow-hidden">
      <thead>
        <tr>
          <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
            Role Name
          </th>
          <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="role in roles" :key="role.id" class="hover:bg-gray-100 transition duration-200">
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div v-if="editRoleId !== role.id">{{ role.name }}</div>
            <input 
              v-else 
              v-model="editRoleName" 
              class="p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
            />
          </td>
          <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200">
            <button 
              @click="editRoleId !== role.id ? startEditing(role) : saveEdit(role.id)" 
              class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300 mr-2"
            >
              {{ editRoleId !== role.id ? 'Edit' : 'Save' }}
            </button>
            <button 
              @click="deleteRole(role.id)" 
              class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300"
            >
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>
.container {
  max-width: 800px;
  margin: 0 auto;
}

button {
  cursor: pointer;
}
</style>
