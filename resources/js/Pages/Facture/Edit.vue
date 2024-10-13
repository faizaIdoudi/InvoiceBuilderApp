<template>
    <NavLayout>
      <div class="container mx-auto p-4 max-w-md">
        <h1 class="text-2xl font-bold mb-6">Edit Invoice</h1>
  
        <form @submit.prevent="submitForm">
          <!-- Invoice Number Input -->
          <div class="mb-4">
            <label for="numero_facture" class="block text-gray-700">Invoice Number</label>
            <input
              type="text"
              id="numero_facture"
              v-model="form.numero_facture"
              class="border p-2 w-full rounded"
              required
              readonly
            />
          </div>
  
          <!-- Invoice Date Input -->
          <div class="mb-4">
            <label for="date_facture" class="block text-gray-700">Invoice Date</label>
            <input
              type="date"
              id="date_facture"
              v-model="form.date_facture"
              class="border p-2 w-full rounded"
              required
            />
          </div>
  
          <!-- Supplier Name Input -->
          <div class="mb-4">
            <label for="nom_fournisseur" class="block text-gray-700">Supplier Name</label>
            <input
              type="text"
              id="nom_fournisseur"
              v-model="form.nom_fournisseur"
              class="border p-2 w-full rounded"
              required
            />
          </div>
  
          <!-- Client Name Input -->
          <div class="mb-4">
            <label for="nom_client" class="block text-gray-700">Client Name</label>
            <input
              type="text"
              id="nom_client"
              v-model="form.nom_client"
              class="border p-2 w-full rounded"
            />
          </div>
  
          <!-- Products Section -->
          <h2 class="text-lg font-semibold mt-4">Products</h2>
          <div v-for="(product, index) in form.products" :key="index" class="mb-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
              <div>
                <label :for="'nom' + index" class="block text-gray-700">Product</label>
                <input
                  v-model="product.nom"
                  type="text"
                  :id="'nom' + index"
                  class="border p-2 w-full rounded"
                  placeholder="Product Name"
                  required
                />
              </div>
              <div>
                <label :for="'nombre' + index" class="block text-gray-700">Quantity</label>
                <input
                  v-model="product.nombre"
                  type="number"
                  :id="'nombre' + index"
                  class="border p-2 w-full rounded"
                  required
                  min="1"
                />
              </div>
              <div>
                <label :for="'pvp' + index" class="block text-gray-700">Unit Price (PHT)</label>
                <input
                  v-model="product.pvp"
                  type="number"
                  :id="'pvp' + index"
                  class="border p-2 w-full rounded"
                  required
                  min="0"
                />
              </div>
            </div>
            <div class="flex items-end">
              <button type="button" @click="removeProduct(index)" class="text-red-500 hover:text-red-700">Remove</button>
            </div>
          </div>
  
          <button type="button" @click="addProduct" class="bg-blue-500 text-white px-4 py-2 rounded">Add Product</button>
  
         <!-- Invoice Details Section -->
         <h2 class="text-lg font-semibold mt-6">Invoice Details</h2>
        <div class="mb-4">
          <label for="total_ht" class="block text-gray-700">Total Before Taxes (HT)</label>
          <input
            v-model="form.total_ht"
            type="number"
            id="total_ht"
            class="border p-2 w-full rounded"
            min="0"
            required
          />
        </div>
        <div class="mb-4">
          <label for="total_tva" class="block text-gray-700">Tax Amount (TVA)</label>
          <input
            v-model="form.total_tva"
            type="number"
            id="total_tva"
            class="border p-2 w-full rounded"
            min="0"
            required
          />
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded" :disabled="form.processing">
          Update Invoice
        </button>
      </form>
    </div>
  </NavLayout>
  </template>
  
  <script>
  import { useForm, usePage } from '@inertiajs/vue3';
  import NavLayout from '@/Layouts/NavLayout.vue'; // Ensure the path is correct
  
  export default {
    components: {
      NavLayout,
    },
    setup() {
        const { props } = usePage();
  const facture = props.facture || {}; // Ensure facture is not undefined

  const form = useForm({
    numero_facture: facture.numero_facture || '',    
    date_facture: facture.date_facture || '',        
    nom_fournisseur: facture.nom_fournisseur || '',  
    nom_client: facture.nom_client || '',            
    products: facture.produits || [{ nom: '', nombre: 1, pvp: 0 }],  // Here, ensure 'produits' from the controller
    total_ht: facture.total_ht || 0,  // Updated to match the model
    total_tva: facture.total_tva || 0, // Updated to match the model
    processing: false,
});


  function addProduct() {
    form.products.push({ nom: '', nombre: 1, pvp: 0 });
  }

  function removeProduct(index) {
    if (form.products.length > 1) {
      form.products.splice(index, 1);
    }
  }

  async function submitForm() {
    form.processing = true;
    try {
      await form.put(`/facture/${facture.id}`, form);  // Use PUT request to update the invoice
      alert('Invoice updated successfully!');
    } catch (error) {
      console.error('Error updating invoice:', error);
    } finally {
      form.processing = false;
    }
}


  return { form, addProduct, removeProduct, submitForm };
}
};
</script>

<style scoped>
.container {
  max-width: 900px;
}
  </style>
  