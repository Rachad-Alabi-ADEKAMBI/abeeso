<?php

ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

session_start();

// Check if the user is not logged in (i.e., if $_SESSION['login'] does not exist)
if (isset($_SESSION['user'])) {
?>
  <script>
    //  alert('Veuillez vous connecter d\'abord');
    window.location.replace('dashboard.php');
  </script>
<?php
  // Exit to stop further execution of the script after the redirect
  exit();
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include 'meta.php'; ?>

  <link rel="stylesheet" href="login.css" />

  <title>Connexion - Soirée Culturelle Africaine</title>
</head>

<body>
  <!-- Navigation -->
  <?php include 'header.php'; ?>

  <!-- Login Section -->
  <section class="login-section">
    <div class="login-container">
      <div class="login-card">
        <div class="login-header">
          <div class="login-logo">
            <i class="fas fa-drum"></i>
          </div>
          <h2>Connexion</h2>
          <p>Accédez à votre espace personnel</p>
        </div>

        <form method="POST" action="api/api.php?action=login"
          class="login-form" id="login-form">
          <div class="form-group">
            <label for="username"><i class="fas fa-user"></i> Nom d'utilisateur</label>
            <input type="text" id="username" name="username"
              value="<?= isset($_SESSION['login']['username']) ? $_SESSION['login']['username'] : '' ?>" required>

          </div>

          <div class="form-group">
            <label for="password"><i class="fas fa-lock"></i> Mot de passe</label>
            <div class="password-input-container">
              <input type="password" id="password" name="password" required />
              <button type="button" class="toggle-password" id="toggle-password">
                <i class="fas fa-eye"></i>
              </button>
            </div>
            <div class="form-error" id="password-error"></div>
          </div>

          <button type="submit" class="btn btn-primary login-btn">
            <i class="fas fa-sign-in-alt"></i> Se connecter
          </button>
        </form>
      </div>

      <div class="login-image">
        <div class="login-overlay"></div>
        <div class="login-content">
          <h2>Soirée Culturelle Africaine</h2>
          <p>31 MAI 2025 | 20H - 02H | FONBEAUZARD</p>
          <div class="login-event-details">
            <div class="event-detail">
              <i class="fas fa-music"></i>
              <span>DJ Animation</span>
            </div>
            <div class="event-detail">
              <i class="fas fa-tshirt"></i>
              <span>Défilé de Mode</span>
            </div>
            <div class="event-detail">
              <i class="fas fa-drum"></i>
              <span>Danses Folkloriques</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <script src="script.js"></script>


</body>

</html>