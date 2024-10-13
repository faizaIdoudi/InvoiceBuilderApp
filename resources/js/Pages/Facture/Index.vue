<template>
  <NavLayout>
    <div class="invoice-management">
      <!-- Header -->
      <div class="header">
        <h1>Invoice Management</h1>
        <button class="add-invoice-btn" @click="goToCreateForm">+ Create New Invoice</button>
      </div>

      <!-- Invoice List -->
      <div v-if="factures.length" class="invoice-list">
        <table class="invoice-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Invoice Number</th>
              <th>Client Name</th>
              <th>Invoice Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(facture, index) in factures" :key="facture.id">
              <td>{{ index + 1 }}</td>
              <td>{{ facture.numero_facture }}</td>
              <td>{{ facture.nom_client }}</td>
              <td>{{ facture.date_facture }}</td>
              <td>
                <button @click="editInvoice(facture.id)" class="action-btn edit">Edit</button>
                <button @click="removeInvoice(facture.id)" class="action-btn delete">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- No Invoices Message -->
      <div v-else class="no-invoice">
        <p>No invoices found. Please create a new invoice.</p>
      </div>
    </div>
  </NavLayout>
</template>

<script>
import NavLayout from '@/Layouts/NavLayout.vue';

export default {
  props: {
    factures: {
      type: Array,
      default: () => [], // Default value is an empty array
    },
  },
  components: {
    NavLayout,
  },
  methods: {
    goToCreateForm() {
      this.$inertia.visit('/facture/create'); // Redirect to form for adding new invoice
    },
    editInvoice(id) {
      this.$inertia.visit(`/facture/${id}/edit`); // Redirect to edit form
    },
    async removeInvoice(id) {  // Changed method name to removeInvoice
      if (confirm('Are you sure you want to remove this invoice?')) {
        try {
          await this.$inertia.delete(`/facture/${id}`, {
            onSuccess: () => alert('Invoice removed successfully'),
            onError: (error) => {
              console.error('Error removing invoice:', error);
              alert('Error removing the invoice');
            },
          });
        } catch (error) {
          console.error('Error removing invoice:', error);
        }
      }
    },
  },
};
</script>

<style scoped>
.invoice-management {
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

.add-invoice-btn {
  padding: 10px 20px;
  background-color: #4caf50;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}

.invoice-table {
  width: 100%;
  border-collapse: collapse;
}

.invoice-table th,
.invoice-table td {
  border: 1px solid #ddd;
  padding: 8px;
}

.invoice-table th {
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

.no-invoice {
  text-align: center;
  font-size: 16px;
  color: #555;
}
</style>
