<template>
    <div class="container mx-auto p-4">
      <h1 class="text-xl font-bold mb-4">Clients</h1>
      
      <!-- Add New Client Button -->
      <button @click="goToCreateForm" class="bg-green-500 text-white px-4 py-2 rounded mb-4">
        Add New Client
      </button>
  
      <!-- Clients Table -->
      <table class="min-w-full bg-white">
        <thead>
          <tr>
            <th class="py-2">ID</th>
            <th class="py-2">Name</th>
            <th class="py-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="client in clients" :key="client.id">
            <td class="border px-4 py-2">{{ client.matricule }}</td>
            <td class="border px-4 py-2">{{ client.nom }}</td>
            <td class="border px-4 py-2">
              <button @click="editClient(client.id)" class="bg-blue-500 text-white px-2 py-1 rounded">Update</button>
              <button @click="removeClient(client.id)" class="bg-red-500 text-white px-2 py-1 rounded ml-2">Remove</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      clients: Array,
    },
    methods: {
      goToCreateForm() {
        this.$inertia.visit('/client/create'); // Redirect to the form for adding a client
      },
      editClient(id) {
        this.$inertia.visit(`/client/edit/${id}`); // Redirect to the edit form
      },
      removeClient(id) {
        if (confirm('Are you sure you want to remove this client?')) {
          this.$inertia.delete(`/client/${id}`); // Call the delete route
        }
      }
    }
  }
  </script>
  