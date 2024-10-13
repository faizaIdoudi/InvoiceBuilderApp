<template>
  <NavLayout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
      <h1 class="text-2xl font-bold text-center mb-4">Create Invoice</h1>

      <form @submit.prevent="submitForm" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label for="numero_facture" class="block text-sm font-medium text-gray-700">Invoice Number</label>
            <input
              v-model="form.numero_facture"
              type="text"
              id="numero_facture"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              required
            />
          </div>
          <div>
            <label for="date_facture" class="block text-sm font-medium text-gray-700">Invoice Date</label>
            <input
              v-model="form.date_facture"
              type="date"
              id="date_facture"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              required
            />
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label for="nom_fournisseur" class="block text-sm font-medium text-gray-700">Supplier Name</label>
            <input
              v-model="form.nom_fournisseur"
              type="text"
              id="nom_fournisseur"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              required
            />
          </div>
          <div>
            <label for="nom_client" class="block text-sm font-medium text-gray-700">Client Name</label>
            <input
              v-model="form.nom_client"
              type="text"
              id="nom_client"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
            />
          </div>
        </div>

        <h2 class="text-lg font-semibold mt-4">Products</h2>
        <div v-for="(product, index) in form.products" :key="index" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
          <div>
            <label :for="'nom' + index" class="block text-sm font-medium text-gray-700">Product</label>
            <input
              v-model="product.nom"
              type="text"
              :id="'nom' + index"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              placeholder="Product Name"
              required
            />
          </div>
          <div>
            <label :for="'nombre' + index" class="block text-sm font-medium text-gray-700">Quantity</label>
            <input
              v-model="product.nombre"
              type="number"
              :id="'nombre' + index"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              required
              min="1"
            />
          </div>
          <div>
            <label :for="'pvp' + index" class="block text-sm font-medium text-gray-700">Unit Price (PHT)</label>
            <input
              v-model="product.pvp"
              type="number"
              :id="'pvp' + index"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              required
              min="0"
            />
          </div>
          <div class="flex items-end">
            <button type="button" @click="removeProduct(index)" class="text-red-500 hover:text-red-700">Remove</button>
          </div>
        </div>

        <button type="button" @click="addProduct" class="bg-blue-500 text-white rounded-md px-4 py-2">Add Product</button>

        <h2 class="text-lg font-semibold mt-6">Invoice Details</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label for="total_ht" class="block text-sm font-medium text-gray-700">Total Before Taxes (HT)</label>
            <input
              v-model="form.total_ht"
              type="number"
              id="total_ht"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              min="0"
              required
            />
          </div>
          <div>
            <label for="total_tva" class="block text-sm font-medium text-gray-700">Tax Amount (TVA)</label>
            <input
              v-model="form.total_tva"
              type="number"
              id="total_tva"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              min="0"
              required
            />
          </div>
        </div>

        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded mt-4">Submit Invoice</button>
      </form>
    </div>
  </NavLayout>
</template>

<script>
import NavLayout from '@/Layouts/NavLayout.vue';

export default {
  components: {
    NavLayout,
  },
  data() {
    return {
      form: {
        numero_facture: '',
        date_facture: '',
        nom_fournisseur: '',
        nom_client: '',
        products: [{ nom: '', nombre: 1, pvp: 0 }], // Initialize with one product
        total_ht: 0,  // Updated to match the model
        total_tva: 0,
      },
    };
  },
  methods: {
    addProduct() {
      this.form.products.push({ nom: '', nombre: 1, pvp: 0 });
    },
    removeProduct(index) {
      if (this.form.products.length > 1) {
        this.form.products.splice(index, 1);
      }
    },
    async submitForm() {
      try {
        await this.$inertia.post('/facture', this.form);
        alert('Invoice created successfully!');
        this.$inertia.visit('/facture'); // Redirect after successful submission
      } catch (error) {
        console.error('Error creating invoice:', error);
        alert('Failed to create the invoice. Please check your data and try again.');
      }
    },
  },
};
</script>

<style scoped>
.container {
  max-width: 900px;
}
</style>
