<template>
    <div class="container mx-auto p-4">
      <h1 class="text-xl font-bold mb-4">Edit Client</h1>
      
      <form @submit.prevent="submitForm">
        <div class="mb-4">
          <label class="block text-gray-700">Nom</label>
          <input v-model="form.nom" type="text" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700">Prénom</label>
          <input v-model="form.prenom" type="text" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700">Matricule</label>
          <input v-model="form.matricule" type="text" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700">Numéro de téléphone</label>
          <input v-model="form.numero_telephone" type="text" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700">Adresse</label>
          <input v-model="form.adresse" type="text" class="border p-2 w-full" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Client</button>
      </form>
    </div>
  </template>
  
  <script>
  import { Inertia } from '@inertiajs/inertia';
  
  export default {
    props: {
      client: Object,
    },
    data() {
      return {
        form: { ...this.client }
      };
    },
    methods: {
      submitForm() {
        Inertia.put(`/client/${this.client.id}`, this.form);
      }
    }
  }
  </script>
  