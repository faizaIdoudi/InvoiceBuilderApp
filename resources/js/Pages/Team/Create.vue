<template>
  <div class="container mx-auto p-4 max-w-md">
    <h1 class="text-2xl font-bold mb-6">Add New Team Member</h1>

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

      <!-- Password Input -->
      <div class="mb-4">
        <label for="password" class="block text-gray-700">Password</label>
        <input
          type="password"
          id="password"
          v-model="form.password"
          class="border p-2 w-full rounded"
          required
          placeholder="Enter password"
        />
      </div>

      <!-- Submit Button -->
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
        Add Team Member
      </button>
    </form>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3'; // Correct import for inertia.js

export default {
  setup() {
    const form = useForm({
      first_name: '',
      surname: '',
      email: '',
      password: ''
    });

    function submitForm() {
      form.post('/team', {
        onSuccess: () => {
          console.log('Form submitted successfully');
        },
        onError: (errors) => {
          console.error('Error submitting form:', errors);
        }
      });
    }

    return { form, submitForm };
  }
};
</script>

<style scoped>
/* Add any additional styles if needed */
</style>
