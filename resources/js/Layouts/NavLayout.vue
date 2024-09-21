<template>
    <div class="nav-layout flex">
      <!-- Menu à gauche -->
      <aside class="w-1/4 h-screen bg-gray-800 text-white">
        <nav class="p-16">
          <ul>
            <!-- Lien vers Dashboard -->
            <li class="mb-4">
              <a href="#" class="flex items-center space-x-3 p-2 rounded hover:bg-blue-700">
                <span class="material-icons">dashboard</span>
                <span>Dashboard</span>
              </a>
            </li>
  
            <!-- Lien vers Users -->
            <li class="mb-4">
              <a @click.prevent="$inertia.visit(route('team.index'))" class="flex items-center space-x-3 p-2 rounded hover:bg-blue-700 cursor-pointer">
                <span>Utilisateurs</span>
              </a>
            </li>
  
            <!-- Lien vers Clients -->
            <li class="mb-4">
              <a @click.prevent="$inertia.visit(route('client.index'))" class="flex items-center space-x-3 p-2 rounded hover:bg-blue-700 cursor-pointer">
                <span>Clients</span>
              </a>
            </li>

            <!-- Lien vers Factures -->
            <li class="mb-4">
              <a @click.prevent="$inertia.visit(route('facture.index'))" class="flex items-center space-x-3 p-2 rounded hover:bg-blue-700 cursor-pointer">
                <span>Factures</span>
              </a>
            </li>
           
          </ul>
        </nav>
      </aside>
  
      <!-- Contenu principal -->
      <main class="w-3/4 p-4">
        <slot></slot>
      </main>
    </div>
  </template>
  
  <script>
  export default {
    name: "NavLayout",
  };
  </script>
  