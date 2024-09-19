<template>
  <div class="home-container flex flex-col min-h-screen relative">
    <!-- Navigation Bar -->
    <nav class="navbar fixed top-0 left-0 right-0 bg-white shadow-lg z-20">
      <div class="container mx-auto flex justify-between items-center p-4">
        <div class="logo w-24 h-auto">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-400">
            <path d="M12 2.25c-5.305 0-9.75 4.445-9.75 9.75S6.695 21.75 12 21.75 21.75 17.305 21.75 12 17.305 2.25 12 2.25zM12 18.75a6.75 6.75 0 1 1 0-13.5 6.75 6.75 0 0 1 0 13.5z"/>
          </svg>
        </div>
        <ul class="flex space-x-6">
          <li><a href="#features" class="text-gray-900 hover:text-blue-600 transition-colors">Features</a></li>
          <li><a href="#contact" class="text-gray-900 hover:text-blue-600 transition-colors">Contact</a></li>
          <li>
            <Link :href="route('login')" class="px-4 py-2 bg-yellow-400 text-gray-900 font-semibold rounded-full hover:bg-yellow-500 transition-colors">
              Se Connecter
            </Link>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Background Image -->
    <div class="background-image absolute inset-0 bg-cover bg-center"></div>

    <!-- Overlay pour améliorer la lisibilité -->
    <div class="overlay absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-800 opacity-40"></div>

    <!-- Content Section -->
    <div class="content relative z-10 text-center py-20 px-6 bg-white bg-opacity-90 rounded-lg shadow-lg my-2 w-3/4 mx-auto">
      <div class="logo w-32 h-auto mx-auto mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-yellow-400">
          <path d="M12 2.25c-5.305 0-9.75 4.445-9.75 9.75S6.695 21.75 12 21.75 21.75 17.305 21.75 12 17.305 2.25 12 2.25zM12 18.75a6.75 6.75 0 1 1 0-13.5 6.75 6.75 0 0 1 0 13.5z"/>
        </svg>
      </div>

      <h1 class="text-6xl font-extrabold text-gray-900 mb-4 leading-tight drop-shadow-lg">
        Gérez vos factures avec <span class="text-yellow-400">FactureApp</span>
      </h1>
      <p class="text-xl text-gray-700 mb-8 max-w-3xl mx-auto">
        Simplifiez votre processus de facturation, suivez vos finances, et améliorez votre productivité. Tout en un seul endroit.
      </p>
      <Link
        :href="route('login')"
        class="px-10 py-4 bg-yellow-400 text-gray-900 font-semibold rounded-full shadow-lg hover:bg-yellow-500 hover:scale-105 transition-transform duration-300"
      >
        Se Connecter
      </Link>
    </div>

    <!-- Features Section -->
    <section id="features" class="features py-16 px-6 mt-12 relative z-10">
      <h2 class="text-4xl font-bold text-center text-blue-800 mb-12">
        Pourquoi choisir FactureApp ?
      </h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-12 max-w-6xl mx-auto">
        <!-- Feature 1 -->
        <div class="feature-item text-center bg-white p-6 rounded-lg shadow-lg">
          <svg class="w-24 h-24 mx-auto mb-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L12 19.25L14.25 17M19.25 12L16.5 14.75L14.25 12M9.75 7L12 9.25L14.25 7M4.75 12L7.5 14.75L9.75 12L7.5 9.25L4.75 12zM12 19.25L9.75 17L7.5 19.25L4.75 17L7.5 14.75L9.75 12L7.5 9.25L4.75 7L7.5 4.75L9.75 7L12 4.75L14.25 7L16.5 4.75L19.25 7L16.5 9.25L14.25 12L16.5 14.75L19.25 17L16.5 19.25L14.25 17L12 19.25z"></path>
          </svg>
          <h3 class="text-2xl font-semibold text-gray-800 mb-2">Facilité d'utilisation</h3>
          <p class="text-gray-700">
            Interface intuitive et facile à prendre en main, conçue pour vous faire gagner du temps.
          </p>
        </div>
        <!-- Feature 2 -->
        <div class="feature-item text-center bg-white p-6 rounded-lg shadow-lg">
          <svg class="w-24 h-24 mx-auto mb-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.5 6.5L19.5 9.5M8.25 9L5.25 6M9.75 7L12 9.25L14.25 7M4.75 12L7.5 14.75L9.75 12L7.5 9.25L4.75 12zM12 19.25L9.75 17L7.5 19.25L4.75 17L7.5 14.75L9.75 12L7.5 9.25L4.75 7L7.5 4.75L9.75 7L12 4.75L14.25 7L16.5 4.75L19.25 7L16.5 9.25L14.25 12L16.5 14.75L19.25 17L16.5 19.25L14.25 17L12 19.25z"></path>
          </svg>
          <h3 class="text-2xl font-semibold text-gray-800 mb-2">Suivi en Temps Réel</h3>
          <p class="text-gray-700">
            Suivez l'état de vos factures et paiements en temps réel, où que vous soyez.
          </p>
        </div>
        <!-- Feature 3 -->
        <div class="feature-item text-center bg-white p-6 rounded-lg shadow-lg">
          <svg class="w-24 h-24 mx-auto mb-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.75 12L7.5 14.75L9.75 12L7.5 9.25L4.75 12zM12 19.25L9.75 17L7.5 19.25L4.75 17L7.5 14.75L9.75 12L7.5 9.25L4.75 7L7.5 4.75L9.75 7L12 4.75L14.25 7L16.5 4.75L19.25 7L16.5 9.25L14.25 12L16.5 14.75L19.25 17L16.5 19.25L14.25 17L12 19.25z"></path>
          </svg>
          <h3 class="text-2xl font-semibold text-gray-800 mb-2">Sécurisé & Fiable</h3>
          <p class="text-gray-700">
            Vos données sont protégées avec le plus haut niveau de sécurité. Confiance assurée.
          </p>
        </div>
      </div>
    </section>

    <!-- Footer Section -->
    <footer id="contact" class="footer bg-indigo-900 text-gray-200 py-6 relative z-10">
      <div class="container mx-auto text-center">
        <p class="mb-4">© 2024 FactureApp. Tous droits réservés.</p>
        <p>Contactez-nous à <a href="mailto:contact@factureapp.com" class="text-yellow-400 hover:text-yellow-300 transition-colors">contact@factureapp.com</a></p>
      </div>
    </footer>
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
  position: relative;
  overflow: hidden;
}

.background-image {
  background-image: url('@/assets/background.jpg');
  background-size: cover;
  background-position: center;
  position: absolute;
  inset: 0;
  z-index: 0;
}

.overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.4);
  z-index: 1;
}

.content {
  position: relative;
  z-index: 10;
}

.navbar {
  top: 0;
  left: 0;
  right: 0;
  background-color: rgba(255, 255, 255, 0.9);
  border-bottom: 1px solid #e5e7eb;
}

.navbar .logo svg {
  fill: currentColor;
}

.navbar ul {
  display: flex;
  gap: 1.5rem;
}

h1 {
  font-family: 'Poppins', sans-serif;
}

.features .feature-item {
  transition: transform 0.3s ease;
}

.features .feature-item:hover {
  transform: translateY(-5px);
}

footer a {
  transition: color 0.3s ease;
}

footer a:hover {
  color: #fff;
}
</style>
