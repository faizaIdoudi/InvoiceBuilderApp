<template>
    <div class="team-management">
      <!-- Header -->
      <div class="header">
        <h1>Team Members</h1>
        <button class="add-team-btn" @click="goToCreateForm">+ Add New Team Member</button>
      </div>
  
      <!-- Team List -->
      <div v-if="teams.length" class="team-list">
        <table class="team-table">
          <thead>
            <tr>
              <th>#</th>
              <th>First Name</th>
              <th>Surname</th>
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="team in teams" :key="team.id">
              <td>{{ index + 1 }}</td>
              <td>{{ team.firstName }}</td>
              <td>{{ team.surname }}</td>
              <td>{{ team.email }}</td>
              <td>
                <button @click="editMember(team.id)" class="action-btn edit">Update</button>
                <button @click="removeMember(team.id)" class="action-btn delete">Remove</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
  
      <!-- No Team Members Message -->
      <div v-else class="no-team">
        <p>No team members found. Please add a new member.</p>
      </div>
    </div>
  </template>
  
  <script>

  export default {
    props: {
      teams: {
        type: Array,
        default: () => [] // Default value as an empty array
      }
    },
    methods: {
      goToCreateForm() {
        this.$inertia.visit('/team/create'); // Redirect to the form for adding a team member
      },
      editMember(id) {
        this.$inertia.visit(`/team/edit/${id}`); // Redirect to the edit form
      },
      async removeMember(id) {
        if (confirm('Are you sure you want to remove this member?')) {
          try {
            await this.$inertia.delete(`/team/${id}`); // Call the delete route
            // Optionally: refresh the page or remove the item from the list
          } catch (error) {
            console.error('Error removing member:', error);
          }
        }
      }
    }
  };
  </script>
  
  <style scoped>
  .team-management {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
    font-family: Arial, sans-serif;
  }
  
  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }
  
  .add-team-btn {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
  }
  
  .team-table {
    width: 100%;
    border-collapse: collapse;
  }
  
  .team-table th, .team-table td {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
  .team-table th {
    background-color: #f2f2f2;
    text-align: left;
  }
  
  .action-btn {
    padding: 5px 10px;
    margin-right: 5px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  
  .edit {
    background-color: #4CAF50;
    color: white;
  }
  
  .delete {
    background-color: #f44336;
    color: white;
  }
  
  .no-team {
    text-align: center;
    font-size: 16px;
    color: #555;
  }
  </style>
  