<template>
  <NavLayout>
    <div class="container mx-auto p-4 max-w-md">
      <h1 class="text-2xl font-bold mb-6">Edit Team</h1>
  
      <form @submit.prevent="submitForm">
        <!-- First Name Input -->
        <div class="mb-4">
          <label for="first_name" class="block text-gray-700">First Name</label>
          <input
            type="text"
            id="first_name"
            v-model="form.first_name"
            class="border p-2 w-full rounded"
            required
            placeholder="Enter first name"
          />
        </div>
  
        <!-- Surname Input -->
        <div class="mb-4">
          <label for="surname" class="block text-gray-700">Surname</label>
          <input
            type="text"
            id="surname"
            v-model="form.surname"
            class="border p-2 w-full rounded"
            required
            placeholder="Enter surname"
          />
        </div>
  
        <!-- Email Input -->
        <div class="mb-4">
          <label for="email" class="block text-gray-700">Email</label>
          <input
            type="email"
            id="email"
            v-model="form.email"
            class="border p-2 w-full rounded"
            required
            placeholder="Enter email"
          />
        </div>
  
        <!-- Password Input (optional, in case of password update) -->
        <div class="mb-4">
          <label for="password" class="block text-gray-700">Password (Leave blank to keep current password)</label>
          <input
            type="password"
            id="password"
            v-model="form.password"
            class="border p-2 w-full rounded"
            placeholder="Enter new password"
          />
        </div>
  
        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded" :disabled="form.processing">
          Update Team
        </button>
      </form>
    </div>
  </NavLayout>
</template>

<script>
import { useForm, usePage } from '@inertiajs/vue3';
import NavLayout from '@/Layouts/NavLayout.vue'; // Assurez-vous que le chemin est correct

export default {
  setup() {
    const { props } = usePage();
    const team = props.team || {}; // Default to empty object if team is undefined

    const form = useForm({
      first_name: team.first_name || '',
      surname: team.surname || '',
      email: team.email || '',
      password: '', // Leave blank by default
    });

    function submitForm() {
      form.put(`/team/${team.id}`, {
        onSuccess: () => {
          console.log('Team updated successfully');
        },
        onError: (errors) => {
          console.error('Error updating team:', errors);
        },
        preserveState: true, // Preserve form state on errors
      });
    }

    return { form, submitForm };
  },
  components: {
    NavLayout,
  },
};
</script>

<style scoped>
/* Add any additional styles if needed */
</style>
