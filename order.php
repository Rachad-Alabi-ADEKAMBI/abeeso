<?php
function verifyInput($inputContent)
{
  $inputContent = htmlspecialchars($inputContent);
  $inputContent = trim($inputContent);
  return $inputContent;
}

include 'api/db.php';

$menu_id = verifyInput($_GET['menu_id']);

$pdo = getConnexion();

$stmt = $pdo->prepare("SELECT * FROM menu WHERE id = ?");
$stmt->execute([$menu_id]);
$datas = $stmt->fetch();

if (!$datas) {
  echo "
      <script>
          alert('Menu non trouvé ! Veuillez rescanner le QR code.');
          window.location.href = 'index.php';
      </script>
  ";
  exit(); // Très important pour arrêter l'exécution PHP ici
}

$menu_price = $datas['price'];

?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <title>Commander - Soirée Culturelle Africaine</title>

  <?php include 'meta.php'; ?>

  <link rel="stylesheet" href="dashboard.css">

</head>

<body>
  <!-- Navigation -->
  <?php include 'header.php'; ?>

  <!-- Order Form Section -->
  <section class="order-section" id="app">
    <div class="container">
      <h2 class="section-title"><i class="fas fa-utensils"></i> Commander</h2>

      <div class="order-container">
        <div class="order-card">
          <div class="order-header">
            <h3><i class="fas fa-clipboard-list"></i> Formulaire de Commande</h3>
            <p>Commandez vos plats et boissons pour la soirée</p>
          </div>

          <form id="order-form" class="order-form" @submit.prevent="submitOrder">
            <div class="form-group">
              <label for="menu-name"><i class="fas fa-hamburger"></i> Nom du plat/boisson</label>
              <p id="menu-name" name="menu-name">
                <strong> <?= $datas['name'] ?></strong>
              </p>
              <div class="form-error" id="menu-name-error"></div>
            </div>

            <div class="form-group">
              <label for="menu-name"><i class="fas fa-ticket-alt"></i> Prix</label>
              <p id="menu-name" name="menu-name">
                <strong><?= $datas['price'] ?> €</strong>
              </p>
              <div class="form-error" id="menu-name-error"></div>
            </div>

            <div class="form-group">
              <label for="quantity"><i class="fas fa-sort-amount-up-alt"></i> Quantité</label>
              <div class="quantity-input">
                <select id="quantity" name="quantity" v-model="quantity" required>
                  <option value="" disabled selected>Choisissez une quantité</option>
                  <option v-for="n in 10" :key="n" :value="n">{{ n }}</option>
                </select>
              </div>
              <div class="form-error" id="quantity-error"></div>
            </div>


            <div class="form-group">
              <label for="ticket-number"><i class="fas fa-ticket-alt"></i> Numéro du ticket</label>
              <input
                type="number"
                id="ticket-number"
                name="ticket_id"
                placeholder="Ex: 001"
                v-model="ticket_id"
                @input="preventNegativeTicket"
                required>
            </div>


            <div class="order-summary">
              <h4><i class="fas fa-receipt"></i> Récapitulatif</h4>
              <div class="summary-item">
                <span>Intitulé:</span>
                <span id="summary-item">
                  {{ menu_name }}
                </span>
              </div>
              <div class="summary-item">
                <span>Quantité:</span>
                <span id="summary-quantity">
                  {{ quantity }}
                </span>
              </div>
              <div class="summary-item">
                <span>Prix unitaire:</span>
                <span id="summary-price">
                  {{ menu_price }} €
                </span>
              </div>
              <div class="summary-item total">
                <span>Total:</span>
                <span id="summary-total">
                  {{ (menu_price * quantity).toFixed(2) }} €
                </span>
              </div>
            </div>

            <button type="submit" class="btn btn-primary order-btn">
              <i class="fas fa-paper-plane"></i> Envoyer la commande
            </button>
          </form>
        </div>

        <div class="order-info">
          <div class="info-card">
            <div class="info-icon">
              <i class="fas fa-info-circle"></i>
            </div>
            <h3>Comment ça marche?</h3>
            <ol>
              <li>Le QR code que vous venez de scanner correspond au menu souhaité</li>
              <li>Renseignez la quantité souhaité et le numéro de votre ticket</li>
              <li>Vérifiez le récapitulatif de votre commande et validez la commande</li>
            </ol>
          </div>

          <div class="info-card">
            <div class="info-icon">
              <i class="fas fa-clock"></i>
            </div>
            <h3>Temps d'attente</h3>
            <p>Le temps d'attente estimé est de <strong>10-15 minutes</strong> selon l'affluence.</p>
          </div>

          <div class="info-card">
            <div class="info-icon">
              <i class="fas fa-phone-alt"></i>
            </div>
            <h3>Besoin d'aide?</h3>
            <p>Pour toute question concernant votre commande, contactez-nous:</p>
            <p><i class="fas fa-phone"></i> 07.49.74.28.89</p>
            <p><i class="fas fa-envelope"></i> commandes@abeeso-ekolepkan.com</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <script src="script.js"></script>
  <script src="order.js"></script>


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
          menu_name: <?= json_encode($datas['name']); ?>,
          menu_id: <?= json_encode($menu_id); ?>,
          menu_price: <?= json_encode($menu_price); ?>,
          quantity: 1,
          ticket_id: '',
          errors: {}
        };
      },
      computed: {
        totalAmount() {
          return (this.menu_price * this.quantity).toFixed(2);
        }
      },
      methods: {
        preventNegativeTicket() {
          if (this.ticket_id < 0) {
            this.ticket_id = 0;
          }
        },
        submitOrder() {
          if (!this.ticket_id || this.quantity < 1) {
            alert("Veuillez remplir correctement tous les champs.");
            return;
          }

          axios.post('api/api.php?action=newOrder', {
              menu_id: this.menu_id,
              menu_name: this.menu_name,
              quantity: this.quantity,
              total_amount: this.menu_price * this.quantity,
              ticket_id: this.ticket_id
            })
            .then(response => {
              if (response.data.success) {
                alert("Commande envoyée !");
                // Réinitialiser si nécessaire
                this.quantity = 1;
                this.ticket_id = '';
                window.location.replace('index.php');
              } else {
                alert(response.data.message || "Erreur lors de l'envoi.");
              }
            })
            .catch(error => {
              console.error(error);
              alert("Erreur serveur.");
            });
        }
      }
    }).mount("#app");
  </script>


</body>

</html>