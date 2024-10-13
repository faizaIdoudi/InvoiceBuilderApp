<template>
  <NavLayout>
    <div class="client-management">
      <!-- Header -->
      <div class="header">
        <h1>Clients</h1>
        <button class="add-client-btn" @click="goToCreateForm">+ Add New Client</button>
      </div>

      <!-- Client List -->
      <div v-if="clients.length" class="client-list">
        <table class="client-table">
          <thead>
            <tr>
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Phone Number</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(client, index) in clients" :key="client.id">
              <td>{{ index + 1 }}</td>
              <td>{{ client.prenom }}</td>
              <td>{{ client.nom }}</td>
              <td>{{ client.numero_telephone }}</td>
              <td>
                <button @click="editClient(client.id)" class="action-btn edit">Update</button>
                <button @click="removeClient(client.id)" class="action-btn delete">Remove</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- No Clients Message -->
      <div v-else class="no-client">
        <p>No clients found. Please add a new client.</p>
      </div>
    </div>
  </NavLayout>
</template>

<script>
import NavLayout from '@/Layouts/NavLayout.vue'; // Ensure the path is correct

export default {
  props: {
    clients: {
      type: Array,
      default: () => [], // Default value is an empty array
    },
  },
  components: {
    NavLayout,
  },
  methods: {
    goToCreateForm() {
      this.$inertia.visit('/client/create'); // Redirect to form for adding a new client
    },
    editClient(id) {
      this.$inertia.visit(`/client/edit/${id}`); // Redirect to edit form
    },
    async removeClient(id) {
      if (confirm('Are you sure you want to remove this client?')) {
        try {
          await this.$inertia.delete(`/client/${id}`, {
            onSuccess: () => alert('Client removed successfully'),
            onError: (error) => {
              console.error('Error removing client:', error);
              alert('Error removing the client');
            },
          });
        } catch (error) {
          console.error('Error removing client:', error);
        }
      }
    },
  },
};
</script>

<style scoped>
.client-management {
  max-width: 900px;
  margin: 0 auto;
  padding: 20px;
  font-family: Arial, sans-serif;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.add-client-btn {
  padding: 10px 20px;
  background-color: #4caf50;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}

.client-table {
  width: 100%;
  border-collapse: collapse;
}

.client-table th,
.client-table td {
  border: 1px solid #ddd;
  padding: 8px;
}

.client-table th {
  background-color: #f2f2f2;
  text-align: left;
}

.action-btn {
  padding: 5px 10px;
  margin-right: 5px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.edit {
  background-color: #4caf50;
  color: white;
}

.delete {
  background-color: #f44336;
  color: white;
}

.no-client {
  text-align: center;
  font-size: 16px;
  color: #555;
}
</style>
