<?php
session_start();

// Check if the user is not logged in (i.e., if $_SESSION['login'] does not exist)
if (!isset($_SESSION['user'])) {
?>
  <script>
    alert('Veuillez vous connecter d\'abord');
    window.location.replace('login.php');
  </script>
<?php
  // Exit to stop further execution of the script after the redirect
  exit();
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>

  <?php
  include 'meta.php';
  ?>

  <link rel="stylesheet" href="dashboard.css" />

  <title>Tableau de bord - Soirée Culturelle Africaine</title>

</head>

<body>
  <!-- Navigation -->
  <?php include 'header.php'; ?>

  <!-- Dashboard Section -->
  <section class="dashboard-section" id="app">
    <div class="container">
      <h2 class="section-title"><i class="fas fa-chart-line"></i> Tableau de bord</h2>

      <div class="dashboard-header">
        <div class="dashboard-stats">
          <div class="stat-card">
            <div class="stat-icon">
              <i class="fas fa-utensils"></i>
            </div>
            <div class="stat-info">
              <h3>Commandes</h3>
              <p class="stat-value">
                {{ this.orders.length }}
              </p>
              <p class="stat-label">Total</p>
            </div>
          </div>

          <div class="stat-card">
            <div class="stat-icon">
              <i class="fas fa-hourglass-half"></i>
            </div>
            <div class="stat-info">
              <h3>En attente</h3>
              <p class="stat-value">
                {{ this.orders.filter(order => order.status === 'pending').length }}
              </p>
              <p class="stat-label">Commandes</p>
            </div>
          </div>

          <div class="stat-card">
            <div class="stat-icon">
              <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-info">
              <h3>Servies</h3>
              <p class="stat-value">
                {{ this.orders.filter(order => order.status === 'delivered').length }}
              </p>
              <p class="stat-label">Commandes</p>
            </div>
          </div>

          <div class="stat-card">
            <div class="stat-icon">
              <i class="fas fa-euro-sign"></i>
            </div>
            <div class="stat-info">
              <h3>Recettes</h3>
              <p class="stat-value">
                {{ this.orders.reduce((total, order) => total + Number(order.total_amount), 0) }}€
              </p>

              <p class="stat-label">Total</p>
            </div>
          </div>
        </div>

        <div class="dashboard-actions">

          <div class="filter-box">
            <select id="filter-select">
              <option value="all">Tous les statuts</option>
              <option value="en-attente" @click="getPendingOrders()">En attente</option>
              <option value="servi" @click="getDeliveredOrders()">Servi</option>
            </select>
          </div>
        </div>
      </div>

      <div class="dashboard-tabs">
        <button class="tab-btn active" data-tab="commandes">
          <i class="fas fa-clipboard-list"></i> Commandes
        </button>
        <!--
        <button class="tab-btn" data-tab="recettes">
          <i class="fas fa-cash-register"></i> Recettes
        </button>
-->
      </div>

      <div class="dashboard-content">
        <!-- Commandes Tab -->
        <div class="tab-content active" id="commandes-tab">
          <div class="table-responsive">
            <table class="dashboard-table">
              <thead>
                <tr>
                  <th>Intitulé</th>
                  <th>Quantité</th>
                  <th>N° Ticket</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody id="commandes-table-body">
                <tr v-for="order in orders" :key="order.id">
                  <td>{{ order.menu_name }}</td>
                  <td>{{ order.quantity }}</td>
                  <td>{{ order.ticket_id }}</td>
                  <td>
                    <span :class="'status ' + (order.status === 'pending' ? 'pending' : 'delivered')">
                      {{ order.status === 'pending' ? 'En attente' : 'Servi' }}
                    </span>
                  </td>
                  <td>
                    <button class="action-btn serve-btn" v-if="order.status === 'pending'" @click="serveOrder(order.id)">
                      <i class="fas fa-check"></i> Servir
                    </button>
                    <button class="action-btn" v-else>
                      <i class="fas fa-check-double"></i> Servi
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--
          <div class="pagination">
            <button class="pagination-btn" id="prev-page" disabled>
              <i class="fas fa-chevron-left"></i> Précédent
            </button>
            <div class="pagination-info">
              Page <span id="current-page">1</span> sur <span id="total-pages">3</span>
            </div>
            <button class="pagination-btn" id="next-page">
              Suivant <i class="fas fa-chevron-right"></i>
            </button>
          </div>
        </div>
-->

          <!-- Recettes Tab -->
          <div class="tab-content" id="recettes-tab">
            <div class="table-responsive">
              <table class="dashboard-table">
                <thead>
                  <tr>
                    <th>Intitulé</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody id="recettes-table-body">
                  <tr>
                    <td>Brochette de boeuf</td>
                    <td>5</td>
                    <td>10€</td>
                    <td>50€</td>
                    <td>31/05/2025 20:45</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3" class="total-label">Total des recettes</td>
                    <td colspan="2" class="total-value">349€</td>
                  </tr>
                </tfoot>
              </table>
            </div>

            <div class="recettes-summary">
              <div class="summary-card">
                <h3><i class="fas fa-utensils"></i> Plats</h3>
                <p class="summary-value">160€</p>
                <div class="progress-bar">
                  <div class="progress" style="width: 46%;"></div>
                </div>
                <p class="summary-percent">46% des recettes</p>
              </div>

              <div class="summary-card">
                <h3><i class="fas fa-drumstick-bite"></i> Accompagnements</h3>
                <p class="summary-value">57€</p>
                <div class="progress-bar">
                  <div class="progress" style="width: 16%;"></div>
                </div>
                <p class="summary-percent">16% des recettes</p>
              </div>

              <div class="summary-card">
                <h3><i class="fas fa-wine-bottle"></i> Boissons</h3>
                <p class="summary-value">132€</p>
                <div class="progress-bar">
                  <div class="progress" style="width: 38%;"></div>
                </div>
                <p class="summary-percent">38% des recettes</p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <script src="script.js"></script>


  <!-- vue and axios -->
  <script src="vue.global.js"></script>
  <script src="axios.min.js"></script>

  <script>
    const {
      createApp
    } = Vue;

    createApp({
      data() {
        return {
          orders: [],
        };
      },
      methods: {
        getOrders() {
          axios.get('http://127.0.0.1/abeeso/api/api.php?action=getOrders')
            .then(response => {
              if (response.data.success) {
                this.orders = response.data.data; // <- bien prendre .data
                console.log(this.orders);
              } else {
                console.log("Erreur : " + (response.data.message || "Impossible de charger les commandes."));
              }
            })
            .catch(error => {
              console.error(error);
              console.log("Erreur réseau lors de la récupération des commandes.");
            });
        },
        serveOrder(orderId) {
          axios.post('http://127.0.0.1/abeeso/api/api.php?action=serveOrder', {
              orderId: orderId
            })
            .then(response => {
              if (response.data.success) {
                alert("Commande servie avec succès !");
                // this.orders = this.orders.filter(order => order.id !== orderId); // Remove the served order from the list

              } else {
                console.log("Erreur : " + (response.data.message || "Impossible de servir la commande."));
              }
            })
            .catch(error => {
              console.error(error);
              console.log("Erreur réseau lors de la mise à jour de la commande.");
            });

          this.getOrders();
        },
        getPendingOrders() {
          return this.orders.filter(order => order.status.toLowerCase() === 'pending');
        },

        getDeliveredOrders() {
          return this.orders.filter(order => order.status.toLowerCase() === 'delivered');
        }

      },
      computed: {
        getPendingOrders() {
          return this.orders.filter(order => order.status.toLowerCase() === 'en attente');
        },
        getDeliveredOrders() {
          return this.orders.filter(order => order.status.toLowerCase() === 'servi');
        }
      },
      mounted() {
        this.getOrders();
      }
    }).mount("#app");
  </script>
</body>

</html>