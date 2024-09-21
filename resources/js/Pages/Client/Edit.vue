<template>
  <NavLayout>
    <div class="container mx-auto p-4 max-w-md">
      <h1 class="text-2xl font-bold mb-6">Edit Client</h1>

      <form @submit.prevent="submitForm">
        <!-- Nom -->
        <div class="mb-4">
          <label class="block text-gray-700">Nom</label>
          <input v-model="form.nom" type="text" class="border p-2 w-full rounded" required placeholder="Enter nom">
        </div>

        <!-- Prénom -->
        <div class="mb-4">
          <label class="block text-gray-700">Prénom</label>
          <input v-model="form.prenom" type="text" class="border p-2 w-full rounded" required placeholder="Enter prénom">
        </div>

        <!-- Matricule -->
        <div class="mb-4">
          <label class="block text-gray-700">Matricule</label>
          <input v-model="form.matricule" type="text" class="border p-2 w-full rounded" required placeholder="Enter matricule">
        </div>

        <!-- Numéro de Téléphone -->
        <div class="mb-4">
          <label class="block text-gray-700">Numéro de Téléphone</label>
          <input v-model="form.numero_telephone" type="tel" class="border p-2 w-full rounded" required placeholder="Enter numéro de téléphone">
        </div>

        <!-- Adresse -->
        <div class="mb-4">
          <label class="block text-gray-700">Adresse</label>
          <input v-model="form.adresse" type="text" class="border p-2 w-full rounded" required placeholder="Enter adresse">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Client</button>
      </form>
    </div>
  </NavLayout>
</template>

<script>
import { useForm, usePage } from '@inertiajs/vue3';
import NavLayout from '@/Layouts/NavLayout.vue'; // Assurez-vous que le chemin est correct

export default {
  components: {
    NavLayout,
  },
  setup() {
    const { props } = usePage();
    const client = props.client || {}; // Default to empty object if client is undefined

    const form = useForm({
      nom: client.nom || '',
      prenom: client.prenom || '',
      matricule: client.matricule || '',
      numero_telephone: client.numero_telephone || '',
      adresse: client.adresse || '',
    });

    function submitForm() {
      form.put(`/client/${client.id}`, {
        onSuccess: () => {
          alert('Client updated successfully!');
        },
        onError: (errors) => {
          console.error('Error updating client:', errors);
          alert('There was an error updating the client.');
        },
      });
    }

    return { form, submitForm };
  }
};
</script>

<style scoped>
.container {
  margin-top: 20px;
}
</style>
