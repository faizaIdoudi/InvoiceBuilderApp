<template>
  <NavLayout>
    <div class="container mx-auto p-4 max-w-md">
      <h1 class="text-2xl font-bold mb-6">Add New Team Member</h1>

      <form @submit.prevent="submitForm">
        <!-- First Name -->
        <div class="mb-4">
          <label class="block text-gray-700">First Name</label>
          <input
            v-model="form.first_name"
            type="text"
            class="border p-2 w-full rounded"
            required
            placeholder="Enter first name"
          />
        </div>

        <!-- Surname -->
        <div class="mb-4">
          <label class="block text-gray-700">Surname</label>
          <input
            v-model="form.surname"
            type="text"
            class="border p-2 w-full rounded"
            required
            placeholder="Enter surname"
          />
        </div>

        <!-- Email -->
        <div class="mb-4">
          <label class="block text-gray-700">Email</label>
          <input
            v-model="form.email"
            type="email"
            class="border p-2 w-full rounded"
            required
            placeholder="Enter email"
          />
        </div>

        <!-- Password -->
        <div class="mb-4">
          <label class="block text-gray-700">Password</label>
          <input
            v-model="form.password"
            type="password"
            class="border p-2 w-full rounded"
            required
            placeholder="Enter password"
          />
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Team Member</button>
      </form>
    </div>
  </NavLayout>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import NavLayout from '@/Layouts/NavLayout.vue'; // Ensure this path is correct

export default {
  components: {
    NavLayout,
  },
  setup() {
    const form = useForm({
      first_name: '',
      surname: '',
      email: '',
      password: '',
    });

    function submitForm() {
      form.post('/team', {
        onSuccess: () => {
          // Redirect to the index page or another appropriate page after success
          window.location.href = '/team'; // Modify this URL if necessary
        },
        onError: (errors) => {
          console.error('Error submitting form:', errors);
        },
      });
    }

    return { form, submitForm };
  },
};
</script>

<style scoped>
.container {
  margin-top: 20px;
}
</style>
