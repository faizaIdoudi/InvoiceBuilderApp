<template>
    <nav-layout>
      <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Créer une Nouvelle Facture</h1>
  
        <form @submit.prevent="submitForm">
          <div class="mb-4">
            <label for="numero_facture" class="block">Numéro de Facture</label>
            <input v-model="form.numero_facture" type="text" id="numero_facture" class="border px-4 py-2 w-full" required>
          </div>
  
          <div class="mb-4">
            <label for="nom_fournisseur" class="block">Nom du Fournisseur</label>
            <input v-model="form.nom_fournisseur" type="text" id="nom_fournisseur" class="border px-4 py-2 w-full" required>
          </div>
  
          <div class="mb-4">
            <label for="nom_client" class="block">Nom du Client</label>
            <input v-model="form.nom_client" type="text" id="nom_client" class="border px-4 py-2 w-full" required>
          </div>
           <div class="mb-4">
             <label for="matricule_client" class="block">Matricule Client</label>
          <input v-model="form.matricule_client" type="text" id="matricule_client" class="border px-4 py-2 w-full" required>
        </div>

          <div class="mb-4">
            <label for="date_facture" class="block">Date de Facture</label>
            <input v-model="form.date_facture" type="date" id="date_facture" class="border px-4 py-2 w-full" required>
          </div>
  
          <h2 class="text-xl font-semibold mb-4">Produits</h2>
          <table class="table-auto w-full border-collapse border border-gray-300 mb-4">
            <thead>
              <tr class="bg-gray-100">
                <th class="border px-4 py-2">Nombre</th>
                <th class="border px-4 py-2">Nom du Produit</th>
                <th class="border px-4 py-2">Date de Péremption</th>
                <th class="border px-4 py-2">PHT</th>
                <th class="border px-4 py-2">TVA</th>
                <th class="border px-4 py-2">PVP</th>
                <th class="border px-4 py-2">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(product, index) in form.produits" :key="index">
                <td class="border px-4 py-2">
                  <input v-model="product.nombre" type="number" class="border w-full" required>
                </td>
                <td class="border px-4 py-2">
                  <input v-model="product.nom" type="text" class="border w-full" required>
                </td>
                <td class="border px-4 py-2">
                  <input v-model="product.date_peremption" type="date" class="border w-full" required>
                </td>
                <td class="border px-4 py-2">
                  <input v-model="product.pht" type="number" class="border w-full" required>
                </td>
                <td class="border px-4 py-2">
                  <input v-model="product.tva" type="number" class="border w-full" required>
                </td>
                <td class="border px-4 py-2">
                  <input v-model="product.pvp" type="number" class="border w-full" required>
                </td>
                <td class="border px-4 py-2">
                  <button type="button" @click="removeProduct(index)" class="text-red-500">Supprimer</button>
                </td>
              </tr>
            </tbody>
          </table>
          <button type="button" @click="addProduct" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
            Ajouter un Produit
          </button>
  
          <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Sauvegarder Facture
          </button>
        </form>
      </div>
    </nav-layout>
  </template>
  
  <script>
  import NavLayout from '@/Layouts/NavLayout.vue';
  import { useForm } from '@inertiajs/vue3';
  
  export default {
    components: {
      NavLayout,
    },
    setup() {
        const form = useForm({
    numero_facture: '',
    nom_fournisseur: '',
    nom_client: '',
    matricule_client: '', // Assurez-vous que cette valeur est présente
    date_facture: '',
    produits: [{ nombre: '', nom: '', date_peremption: '', pht: '', tva: '', pvp: '' }],
});


function submitForm() {
    // Vérifiez que form est défini et contient les données requises
    console.log('Form data:', form);

    // Appelez la méthode post sur l'objet form
    form.post('/facture', {
        onFinish: () => {
            // Actions à effectuer après la soumission réussie
            console.log('Form submitted successfully!');
        },
        onError: (error) => {
            // Gestion des erreurs
            console.error('Error submitting form:', error);
        }
    });
}

  
      function addProduct() {
        form.produits.push({ nombre: '', nom: '', date_peremption: '', pht: '', tva: '', pvp: '' });
      }
  
      function removeProduct(index) {
        form.produits.splice(index, 1);
      }
  
      return {
        form,
        submitForm,
        addProduct,
        removeProduct,
      };
    },
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 800px;
  }
  </style>
  