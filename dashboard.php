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
  <section class="dashboard-section">
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
              <p class="stat-value">42</p>
              <p class="stat-label">Total</p>
            </div>
          </div>

          <div class="stat-card">
            <div class="stat-icon">
              <i class="fas fa-hourglass-half"></i>
            </div>
            <div class="stat-info">
              <h3>En attente</h3>
              <p class="stat-value">12</p>
              <p class="stat-label">Commandes</p>
            </div>
          </div>

          <div class="stat-card">
            <div class="stat-icon">
              <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-info">
              <h3>Servies</h3>
              <p class="stat-value">30</p>
              <p class="stat-label">Commandes</p>
            </div>
          </div>

          <div class="stat-card">
            <div class="stat-icon">
              <i class="fas fa-euro-sign"></i>
            </div>
            <div class="stat-info">
              <h3>Recettes</h3>
              <p class="stat-value">345€</p>
              <p class="stat-label">Total</p>
            </div>
          </div>
        </div>

        <div class="dashboard-actions">

          <div class="filter-box">
            <select id="filter-select">
              <option value="all">Tous les statuts</option>
              <option value="en-attente">En attente</option>
              <option value="servi">Servi</option>
            </select>
          </div>
        </div>
      </div>

      <div class="dashboard-tabs">
        <button class="tab-btn active" data-tab="commandes">
          <i class="fas fa-clipboard-list"></i> Commandes
        </button>
        <button class="tab-btn" data-tab="recettes">
          <i class="fas fa-cash-register"></i> Recettes
        </button>
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
                <tr>
                  <td>Brochette de boeuf</td>
                  <td>2</td>
                  <td>A123</td>
                  <td><span class="status pending">En attente</span></td>
                  <td>
                    <button class="action-btn serve-btn" data-id="1">
                      <i class="fas fa-check"></i> Servir
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Jus de Bissape</td>
                  <td>3</td>
                  <td>B456</td>
                  <td><span class="status served">Servi</span></td>
                  <td>
                    <button class="action-btn pending-btn" data-id="2">
                      <i class="fas fa-undo"></i> Annuler
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

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

        <!-- Recettes Tab -->
        <div class="tab-content" id="recettes-tab">
          <div class="table-responsive">
            <table class="dashboard-table">
              <thead>
                <tr>
                  <th>Article</th>
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
                <tr>
                  <td>Jus de Bissape</td>
                  <td>8</td>
                  <td>3€</td>
                  <td>24€</td>
                  <td>31/05/2025 21:12</td>
                </tr>
                <tr>
                  <td>Alloco</td>
                  <td>6</td>
                  <td>3€</td>
                  <td>18€</td>
                  <td>31/05/2025 21:30</td>
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
  <script src="dashboard.js"></script>
</body>

</html>