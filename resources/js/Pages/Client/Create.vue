<template>
  <NavLayout>
    <div class="container mx-auto p-4">
      <h1 class="text-xl font-bold mb-4">Add New Client</h1>

      <form @submit.prevent="submitForm">
        <!-- Nom -->
        <div class="mb-4">
          <label class="block text-gray-700">Nom</label>
          <input v-model="form.nom" type="text" class="border p-2 w-full" required placeholder="Enter nom">
        </div>

        <!-- Prénom -->
        <div class="mb-4">
          <label class="block text-gray-700">Prénom</label>
          <input v-model="form.prenom" type="text" class="border p-2 w-full" required placeholder="Enter prénom">
        </div>

        <!-- Matricule -->
        <div class="mb-4">
          <label class="block text-gray-700">Matricule</label>
          <input v-model="form.matricule" type="text" class="border p-2 w-full" required placeholder="Enter matricule">
        </div>

        <!-- Numéro de Téléphone -->
        <div class="mb-4">
          <label class="block text-gray-700">Numéro de Téléphone</label>
          <input v-model="form.numero_telephone" type="tel" class="border p-2 w-full" required placeholder="Enter numéro de téléphone">
        </div>

        <!-- Adresse -->
        <div class="mb-4">
          <label class="block text-gray-700">Adresse</label>
          <input v-model="form.adresse" type="text" class="border p-2 w-full" required placeholder="Enter adresse">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Client</button>
      </form>
    </div>
  </NavLayout>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import NavLayout from '@/Layouts/NavLayout.vue'; // Assurez-vous que le chemin est correct

export default {
  components: {
    NavLayout,
  },
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

<style scoped>
.container {
  margin-top: 20px;
}
</style>
