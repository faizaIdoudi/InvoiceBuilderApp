<template>
  <NavLayout>
    <div class="dashboard-container">
      <h1 class="dashboard-title">Admin Dashboard</h1>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Card 1: Client Statistics -->
        <div class="dashboard-card">
          <h2 class="card-title">Client Statistics</h2>
          <p class="card-value">120</p>
          <p class="card-description">Active Clients</p>
        </div>

        <!-- Card 2: New Orders -->
        <div class="dashboard-card">
          <h2 class="card-title">New Orders</h2>
          <p class="card-value">45</p>
          <p class="card-description">Orders Today</p>
        </div>

        <!-- Card 3: Revenue -->
        <div class="dashboard-card">
          <h2 class="card-title">Revenue</h2>
          <p class="card-value">€3,500</p>
          <p class="card-description">Total Revenue This Month</p>
        </div>

        <!-- Card 4: Recent Users -->
        <div class="dashboard-card">
          <h2 class="card-title">Recent Users</h2>
          <p class="card-value">8</p>
          <p class="card-description">Recently Registered Users</p>
        </div>

        <!-- Card 5: Pending Tasks -->
        <div class="dashboard-card">
          <h2 class="card-title">Pending Tasks</h2>
          <p class="card-value">10</p>
          <p class="card-description">Tasks Awaiting Completion</p>
        </div>

        <!-- Card 6: System Health -->
        <div class="dashboard-card">
          <h2 class="card-title">System Health</h2>
          <p class="card-value">98%</p>
          <p class="card-description">Overall System Performance</p>
        </div>
      </div>

      <!-- Charts Section -->
      <div class="charts-container mt-6">
        <h2 class="charts-title">Trend Analysis</h2>
        <div class="chart">
          <canvas id="revenueChart"></canvas>
        </div>
        <div class="chart">
          <canvas id="clientsChart"></canvas>
        </div>
      </div>
    </div>
  </NavLayout>
</template>

<script>
import NavLayout from '@/Layouts/NavLayout.vue'; // Ensure the path is correct
import { onMounted } from 'vue';
import Chart from 'chart.js/auto'; // Use auto registration for Chart.js

export default {
  name: "Dashboard",
  components: {
    NavLayout
  },
  setup() {
    onMounted(() => {
      createRevenueChart();
      createClientsChart();
    });

    function createRevenueChart() {
      const ctx = document.getElementById('revenueChart').getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
          datasets: [{
            label: 'Revenue',
            data: [3000, 4000, 3500, 5000],
            borderColor: '#4a90e2',
            backgroundColor: 'rgba(74, 144, 226, 0.2)',
            fill: true,
            tension: 0.3
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    }

    function createClientsChart() {
      const ctx = document.getElementById('clientsChart').getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
          datasets: [{
            label: 'Active Clients',
            data: [100, 120, 140, 160],
            borderColor: '#e94e77',
            backgroundColor: 'rgba(233, 78, 119, 0.2)',
            fill: true,
            tension: 0.3
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    }

    return {};
  }
};
</script>

<style scoped>
.dashboard-container {
  padding: 20px;
  max-width: 1200px; /* Limit width for better design */
  margin: 0 auto; /* Center the container */
}

.dashboard-title {
  font-size: 2rem;
  font-weight: bold;
  margin-bottom: 10px;
  color: #1a202c; /* Dark gray text color */
}

.grid {
  display: grid;
  gap: 16px;
}

.dashboard-card {
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
  text-align: center;
}

.card-title {
  font-size: 1.25rem;
  font-weight: bold;
  margin-bottom: 10px;
  color: #2d3748; /* Color for the title */
}

.card-value {
  font-size: 2rem;
  font-weight: bold;
  color: #4a90e2; /* Color for the value */
}

.card-description {
  font-size: 0.875rem;
  color: #6b7280; /* Color for the description */
}

.charts-container {
  margin-top: 20px;
}

.charts-title {
  font-size: 1.5rem;
  font-weight: bold;
  margin-bottom: 10px;
  color: #1a202c; /* Color for the chart title */
}

.chart {
  background-color: #ffffff;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}
</style>
