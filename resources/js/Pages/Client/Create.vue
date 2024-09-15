<template>
    <div class="container mx-auto p-4">
      <h1 class="text-xl font-bold mb-4">Add New Client</h1>
  
      <form @submit.prevent="submitForm">
        <!-- Nom -->
        <div class="mb-4">
          <label class="block text-gray-700">Nom</label>
          <input v-model="form.nom" type="text" class="border p-2 w-full" required>
        </div>
  
        <!-- Prénom -->
        <div class="mb-4">
          <label class="block text-gray-700">Prénom</label>
          <input v-model="form.prenom" type="text" class="border p-2 w-full" required>
        </div>
  
        <!-- Matricule -->
        <div class="mb-4">
          <label class="block text-gray-700">Matricule</label>
          <input v-model="form.matricule" type="text" class="border p-2 w-full" required>
        </div>
  
        <!-- Numéro de Téléphone -->
        <div class="mb-4">
          <label class="block text-gray-700">Numéro de Téléphone</label>
          <input v-model="form.numero_telephone" type="tel" class="border p-2 w-full" required>
        </div>
  
        <!-- Adresse -->
        <div class="mb-4">
          <label class="block text-gray-700">Adresse</label>
          <input v-model="form.adresse" type="text" class="border p-2 w-full" required>
        </div>
  
        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Client</button>
      </form>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia';
  
  export default {
    data() {
      return {
        form: {
          nom: '',
          prenom: '',
          matricule: '',
          numero_telephone: '',
          adresse: '',
        }
      }
    },
    methods: {
      submitForm() {
        Inertia.post('/client', this.form);
      }
    }
  }
  </script>
  