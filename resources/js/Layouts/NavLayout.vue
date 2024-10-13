<template>
  <div class="nav-layout flex h-screen">
    <!-- Left Menu -->
    <aside class="w-1/4 h-full bg-gray-800 text-white flex flex-col justify-between">
      <nav class="flex-1 p-16">
        <ul>
          <!-- Link to Dashboard -->
          <li class="mb-4">
            <a @click.prevent="$inertia.visit(route('dashboard'))" class="flex items-center space-x-3 p-2 rounded hover:bg-blue-700 cursor-pointer">
              <span>Dashboard</span>
            </a>
          </li>

          <!-- Link to Users -->
          <li class="mb-4">
            <a @click.prevent="$inertia.visit(route('team.index'))" class="flex items-center space-x-3 p-2 rounded hover:bg-blue-700 cursor-pointer">
              <span>Team Members</span>
            </a>
          </li>

          <!-- Link to Clients -->
          <li class="mb-4">
            <a @click.prevent="$inertia.visit(route('client.index'))" class="flex items-center space-x-3 p-2 rounded hover:bg-blue-700 cursor-pointer">
              <span>Clients</span>
            </a>
          </li>

          <!-- Link to Invoices -->
          <li class="mb-4">
            <a @click.prevent="$inertia.visit(route('facture.index'))" class="flex items-center space-x-3 p-2 rounded hover:bg-blue-700 cursor-pointer">
              <span>Invoices</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- Logout Button -->
      <div class="p-16">
        <button @click.prevent="$inertia.post(route('logout'))" class="w-full bg-gray-300 p-2 rounded hover:bg-gray-400 text-black">
          Logout
        </button>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="w-3/4 p-4 overflow-y-auto">
      <slot></slot>
    </main>
  </div>
</template>

<script>
export default {
  name: "NavLayout",
};
</script>

<style scoped>
.nav-layout {
  display: flex; /* Enable flexbox for the layout */
  height: 100vh; /* Set the height to full viewport height */
}

aside {
  display: flex;
  flex-direction: column; /* Stack nav items vertically */
}

main {
  overflow-y: auto; /* Enable scrolling in main content */
}
</style>
