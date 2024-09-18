<template>
    <div class="home-container flex flex-col items-center justify-center min-h-screen bg-gray-100">
      <h1 class="text-4xl font-bold text-blue-500">Bienvenue sur FactureApp</h1>
      <p class="mt-4 text-lg text-gray-700">
        Gérez vos factures en toute simplicité.
      </p>
      <div class="mt-8">
        <Link
         :href="route('login')"
          class="px-6 py-3 bg-green-500 text-white rounded-md hover:bg-green-600 transition"
        >
         Login
        </Link>
      </div>
    </div>
  </template>
  
  <script>
import { Link } from '@inertiajs/vue3';

export default {
  name: "Home",
  components: {
    Link,
  },
};
</script>

  
  <style scoped>
  .home-container {
   
    background-size: cover;
    background-position: center;
  }
  </style>
  