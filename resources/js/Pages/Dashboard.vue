<template>
  <NavLayout>
    <div class="dashboard-container">
      <h1 class="dashboard-title">Bienvenue sur le Dashboard</h1>
      <p class="dashboard-description">
        Ceci est votre espace de travail principal. Utilisez le menu de navigation à gauche pour accéder aux fonctionnalités de l'application.
      </p>
      <!-- Ajouter ici le contenu du dashboard -->
    </div>
  </NavLayout>
</template>

<script>
import NavLayout from '@/Layouts/NavLayout.vue'; // Assurez-vous que le chemin est correct

export default {
  name: "Dashboard",
  components: {
    NavLayout
  },
};
</script>

<style scoped>
.dashboard-container {
  padding: 20px;
}

.dashboard-title {
  font-size: 2rem;
  font-weight: bold;
  margin-bottom: 10px;
  color: #1a202c; /* Couleur du texte : gris foncé */
}

.dashboard-description {
  font-size: 1rem;
  color: #4a5568; /* Texte gris moyen */
  margin-bottom: 20px;
  line-height: 1.6;
}

</style>
