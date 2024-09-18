<template>
    <div class="container mx-auto p-4 max-w-md">
      <h1 class="text-2xl font-bold mb-6">Add New Team Member</h1>
  
      <form @submit.prevent="submitForm">
        <!-- First Name Input -->
        <div class="mb-4">
          <label for="firstName" class="block text-gray-700">First Name</label>
          <input
            type="text"
            id="firstName"
            v-model="form.firstName"
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
  import { useForm } from '@inertiajs/inertia-vue3';
  
  export default {
    setup() {
      const form = useForm({
        firstName: '',
        surname: '',
        email: '',
        password: ''
      });
  
      function submitForm() {
        form.post('/team')
          .then(() => {
            // Optionally handle success (e.g., redirect or show a message)
          })
          .catch(error => {
            console.error('Error submitting form:', error);
            // Optionally handle error (e.g., show an error message to the user)
          });
      }
  
      return { form, submitForm };
    }
  };
  </script>
  
  <style scoped>
  /* You can include additional styles if necessary */
  </style>