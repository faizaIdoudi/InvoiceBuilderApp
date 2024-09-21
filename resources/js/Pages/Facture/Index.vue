<template>
    <nav-layout>
      <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Factures</h1>
        <!-- Bouton pour ajouter une nouvelle facture -->
        <Link 
          :href="route('facture.create')" 
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        >
          Add New Facture
        </Link>
      </div>
      <h1 class="text-xl font-bold mb-4">Liste des Factures</h1>
  
      <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
          <tr class="bg-gray-100">
            <th class="border px-4 py-2">Numéro de Facture</th>
            <th class="border px-4 py-2">Nom du Fournisseur</th>
            <th class="border px-4 py-2">Nom du Client</th>
            <th class="border px-4 py-2">Date</th>
            <th class="border px-4 py-2">Total HT</th>
            <th class="border px-4 py-2">Total TVA</th>
            <th class="border px-4 py-2">Total TTC</th>
            <th class="border px-4 py-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="facture in factures" :key="facture.id">
            <td class="border px-4 py-2">{{ facture.numero_facture }}</td>
            <td class="border px-4 py-2">{{ facture.nom_fournisseur }}</td>
            <td class="border px-4 py-2">{{ facture.nom_client }}</td>
            <td class="border px-4 py-2">{{ facture.date_facture }}</td>
            <td class="border px-4 py-2">{{ facture.total_ht }}</td>
            <td class="border px-4 py-2">{{ facture.total_tva }}</td>
            <td class="border px-4 py-2">{{ facture.total_ttc }}</td>
            <td class="border px-4 py-2">
              <Link :href="`/facture/edit/${facture.id}`" class="text-blue-500">Éditer</Link> | 
              <button @click="deleteFacture(facture.id)" class="text-red-500">Supprimer</button>
            </td>
          </tr>
        </tbody>
      </table>
    </nav-layout>
  </template>
  
  <script>
  import NavLayout from '@/Layouts/NavLayout.vue';
  import { Link } from '@inertiajs/vue3'; // Importation de Link
  
  export default {
    components: {
      NavLayout,
      Link, // Enregistrement du composant Link
    },
    props: {
      factures: Array, // Recevoir la liste des factures en tant que prop
    },
    methods: {
      deleteFacture(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette facture ?')) {
          this.$inertia.delete(`/facture/${id}`);
        }
      },
    },
  };
  </script>
  
  <style scoped>
  table {
    width: 100%;
    border-collapse: collapse;
  }
  
  thead th {
    padding: 8px;
    background-color: #f5f5f5;
  }
  
  tbody td {
    padding: 8px;
  }
  </style>
  