<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include 'meta.php'; ?>

  <title>Soirée Culturelle Africaine | 31 Mai 2025</title>
</head>

<body>
  <!-- Navigation -->
  <?php include 'header.php'; ?>

  <!-- Hero Section -->
  <section id="accueil" class="hero">
    <div class="hero-overlay"></div>
    <div class="container">
      <h1>ABEESO EKOLEKPAN</h1>
      <h2>Soirée Culturelle Africaine</h2>
      <p class="event-date">
        <i class="far fa-calendar-alt"></i> 31 MAI 2025 |
        <i class="far fa-clock"></i> 20H - 02H |
        <i class="fas fa-map-marker-alt"></i> FONBEAUZARD
      </p>
      <div class="hero-buttons">
        <a href="#contact" class="btn btn-primary"><i class="fas fa-ticket-alt"></i> Réserver maintenant - 12€</a>
        <a href="#a-propos" class="btn btn-outline"><i class="fas fa-info-circle"></i> Plus d'informations</a>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="a-propos" class="about">
    <div class="container">
      <h2 class="section-title">
        <i class="fas fa-info-circle"></i> À propos de l'événement
      </h2>

      <div class="about-grid">
        <div class="about-card">
          <div class="about-icon">
            <i class="fas fa-music"></i>
          </div>
          <h3>DJ Animation</h3>
          <p>
            Profitez d'une soirée animée par nos talentueux DJs: DJ Ricardo,
            Petit Miguelito, et Fofo Agnitode qui vous feront danser toute la
            nuit avec les meilleurs sons africains.
          </p>
        </div>

        <div class="about-card">
          <div class="about-icon">
            <i class="fas fa-tshirt"></i>
          </div>
          <h3>Défilé de Mode</h3>
          <p>
            Découvrez les créations inspirées des cultures africaines lors de
            notre défilé de mode qui mettra en valeur les talents de créateurs
            locaux et internationaux.
          </p>
        </div>

        <div class="about-card">
          <div class="about-icon">
            <i class="fas fa-drum"></i>
          </div>
          <h3>Danses Folkloriques</h3>
          <p>
            Immergez-vous dans la richesse culturelle africaine avec des
            performances de danses traditionnelles qui vous transporteront au
            cœur du continent.
          </p>
        </div>
      </div>

      <div class="about-video">
        <h3>
          <i class="fas fa-film"></i> Découvrez l'ambiance de nos événements
        </h3>
        <div class="video-container">
          <!-- Facebook video embed code -->
          <iframe
            src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2F100081471638848%2Fvideos%2F1210100523945204%2F&show_text=false&width=336&t=0"
            width="336"
            height="476"
            style="border: none; overflow: hidden"
            scrolling="no"
            frameborder="0"
            allowfullscreen="true"
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
            allowfullscreen="true"></iframe>
        </div>
      </div>

      <div class="performers">
        <h3><i class="fas fa-star"></i> Nos Artistes</h3>
        <div class="performers-grid">
          <div class="performer">
            <div class="performer-image">
              <img src="public/images/dj-ricardo.jpg" alt="DJ Ricardo" />
              <div class="performer-overlay">
                <i class="fas fa-play-circle"></i>
              </div>
            </div>
            <h4>DJ Ricardo</h4>
            <p><i class="fas fa-music"></i> Afrobeat & Amapiano</p>
          </div>
          <div class="performer">
            <div class="performer-image">
              <img
                src="public/images/petit-miguelito.jpg"
                alt="Petit Miguelito" />
              <div class="performer-overlay">
                <i class="fas fa-play-circle"></i>
              </div>
            </div>
            <h4>Petit Miguelito</h4>
            <p><i class="fas fa-music"></i> Coupé-Décalé & Rumba</p>
          </div>
          <div class="performer">
            <div class="performer-image">
              <img
                src="public/images/fofo-agnitode.jpg"
                alt="Fofo Agnitode" />
              <div class="performer-overlay">
                <i class="fas fa-play-circle"></i>
              </div>
            </div>
            <h4>Fofo Agnitode</h4>
            <p><i class="fas fa-music"></i> Afro-House & Zouk</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Menu Section -->
  <section id="menu" class="menu">
    <div class="container">
      <h2 class="section-title">
        <i class="fas fa-utensils"></i> Notre Menu
      </h2>

      <!-- Food Menu -->
      <div class="menu-category">
        <h3><i class="fas fa-hamburger"></i> Plats & Accompagnements</h3>

        <div class="menu-grid">
          <div class="menu-column">
            <h4>
              <i class="fas fa-concierge-bell"></i> Plats - 10€ avec
              accompagnement
            </h4>

            <div class="menu-item">
              <div class="menu-item-image">
                <img
                  src="public/images/brochettes.png"
                  alt="Brochette de boeuf" />
                <div class="menu-item-badge">
                  <i class="fas fa-fire"></i> Populaire
                </div>
              </div>
              <div class="menu-item-info">
                <h5>Brochette de boeuf</h5>
                <p>
                  <i class="fas fa-pepper-hot"></i> Délicieuses brochettes de
                  boeuf marinées aux épices africaines
                </p>
                <div class="menu-item-price">
                  10€ <span>avec accompagnement</span>
                </div>
              </div>
            </div>

            <div class="menu-item">
              <div class="menu-item-image">
                <img
                  src="public/images/poisson_daurade.png"
                  alt="Poisson Daurade braisé" />
              </div>
              <div class="menu-item-info">
                <h5>Poisson Daurade braisé</h5>
                <p>
                  <i class="fas fa-fish"></i> Daurade fraîche braisée avec des
                  épices traditionnelles
                </p>
                <div class="menu-item-price">
                  10€ <span>avec accompagnement</span>
                </div>
              </div>
            </div>

            <div class="menu-item">
              <div class="menu-item-image">
                <img src="public/images/alloco.png" alt="Cuisse de poulet" />
              </div>
              <div class="menu-item-info">
                <h5>Cuisse de poulet</h5>
                <p>
                  <i class="fas fa-drumstick-bite"></i> Cuisse de poulet
                  grillée et assaisonnée à la façon africaine
                </p>
                <div class="menu-item-price">
                  10€ <span>avec accompagnement</span>
                </div>
              </div>
            </div>

            <div class="menu-item">
              <div class="menu-item-image">
                <img src="public/images/moyo.png" alt="Monyo" />
                <div class="menu-item-badge">
                  <i class="fas fa-star"></i> Spécialité
                </div>
              </div>
              <div class="menu-item-info">
                <h5>Monyo (Poulet, Poisson, Aileron)</h5>
                <p>
                  <i class="fas fa-utensils"></i> Assortiment savoureux de
                  poulet, poisson et ailerons
                </p>
                <div class="menu-item-price">
                  10€ <span>avec accompagnement</span>
                </div>
              </div>
            </div>
          </div>

          <div class="menu-column">
            <h4>
              <i class="fas fa-mortar-pestle"></i> Accompagnements - 3€ seul
            </h4>

            <div class="menu-item">
              <div class="menu-item-image">
                <img src="public/images/moyo.png" alt="Ablo" />
              </div>
              <div class="menu-item-info">
                <h5>Ablo</h5>
                <p>
                  <i class="fas fa-bread-slice"></i> Pain de maïs fermenté,
                  spécialité béninoise
                </p>
                <div class="menu-item-price">3€ <span>seul</span></div>
              </div>
            </div>

            <div class="menu-item">
              <div class="menu-item-image">
                <img src="public/images/alloco.png" alt="Alloco" />
                <div class="menu-item-badge">
                  <i class="fas fa-fire"></i> Populaire
                </div>
              </div>
              <div class="menu-item-info">
                <h5>Alloco</h5>
                <p>
                  <i class="fas fa-seedling"></i> Bananes plantains frites, un
                  délice d'Afrique de l'Ouest
                </p>
                <div class="menu-item-price">3€ <span>seul</span></div>
              </div>
            </div>

            <div class="menu-item">
              <div class="menu-item-image">
                <img src="public/images/moyo.png" alt="Akassa" />
              </div>
              <div class="menu-item-info">
                <h5>Akassa</h5>
                <p>
                  <i class="fas fa-mortar-pestle"></i> Pâte de maïs fermentée,
                  accompagnement traditionnel
                </p>
                <div class="menu-item-price">3€ <span>seul</span></div>
              </div>
            </div>

            <div class="menu-item">
              <div class="menu-item-image">
                <img src="public/images/riz.jpg" alt="Riz blanc" />
              </div>
              <div class="menu-item-info">
                <h5>Riz blanc</h5>
                <p>
                  <i class="fas fa-seedling"></i> Riz parfumé cuit à la
                  perfection
                </p>
                <div class="menu-item-price">3€ <span>seul</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Drinks Menu -->
      <div class="menu-category">
        <h3><i class="fas fa-glass-cheers"></i> Carte des Boissons</h3>
        <p class="warning">
          <i class="fas fa-exclamation-triangle"></i> L'ABUS D'ALCOOL EST
          DANGEREUX POUR LA SANTE
        </p>

        <div class="menu-grid">
          <div class="menu-column">
            <h4><i class="fas fa-coffee"></i> Sans Alcool</h4>

            <div class="drink-item">
              <span class="drink-icon"><i class="fas fa-coffee"></i></span>
              <span class="drink-name">Café</span>
              <span class="drink-price">1€</span>
            </div>

            <div class="drink-item">
              <span class="drink-icon"><i class="fas fa-tint"></i></span>
              <span class="drink-name">Eau 50cl</span>
              <span class="drink-price">1€</span>
            </div>

            <div class="drink-item">
              <span class="drink-icon"><i class="fas fa-apple-alt"></i></span>
              <span class="drink-name">Jus de Fruits</span>
              <span class="drink-price">2€</span>
            </div>

            <div class="drink-item">
              <span class="drink-icon"><i class="fas fa-glass-whiskey"></i></span>
              <span class="drink-name">Soda (Coca, Fanta)</span>
              <span class="drink-price">2€</span>
            </div>

            <div class="drink-item">
              <span class="drink-icon"><i class="fas fa-bolt"></i></span>
              <span class="drink-name">Energy Drink / Panaché</span>
              <span class="drink-price">3€</span>
            </div>

            <div class="drink-item">
              <span class="drink-icon"><i class="fas fa-leaf"></i></span>
              <span class="drink-name">Jus de Bissape</span>
              <span class="drink-price">3€</span>
            </div>

            <div class="drink-item">
              <span class="drink-icon"><i class="fas fa-seedling"></i></span>
              <span class="drink-name">Jus de Gingembre</span>
              <span class="drink-price">3€</span>
            </div>
          </div>

          <div class="menu-column">
            <h4><i class="fas fa-wine-bottle"></i> Avec Alcool</h4>

            <div class="drink-item">
              <span class="drink-icon"><i class="fas fa-beer"></i></span>
              <span class="drink-name">Heineken</span>
              <span class="drink-price">4€</span>
            </div>

            <div class="drink-item">
              <span class="drink-icon"><i class="fas fa-beer"></i></span>
              <span class="drink-name">Desperados</span>
              <span class="drink-price">4€</span>
            </div>

            <div class="drink-item">
              <span class="drink-icon"><i class="fas fa-beer"></i></span>
              <span class="drink-name">Guinness</span>
              <span class="drink-price">4€</span>
            </div>

            <div class="drink-item">
              <span class="drink-icon"><i class="fas fa-glass-martini-alt"></i></span>
              <span class="drink-name">Vodka, Whisky</span>
              <span class="drink-price">10€</span>
            </div>

            <div class="drink-item">
              <span class="drink-icon"><i class="fas fa-wine-glass-alt"></i></span>
              <span class="drink-name">Vin Muscador</span>
              <span class="drink-price">10€</span>
            </div>

            <div class="drink-item special">
              <span class="drink-icon"><i class="fas fa-glass-cheers"></i></span>
              <span class="drink-name">Formule</span>
              <span class="drink-price">50€</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="contact">
    <div class="container">
      <h2 class="section-title">
        <i class="fas fa-envelope"></i> Contact & Réservations
      </h2>

      <div class="contact-grid">
        <div class="contact-info">
          <div class="contact-card">
            <div class="contact-icon">
              <i class="fas fa-phone-alt"></i>
            </div>
            <h3>Téléphone</h3>
            <p><i class="fas fa-mobile-alt"></i> 07.49.74.28.89</p>
            <p><i class="fas fa-mobile-alt"></i> 07.49.59.93.82</p>
            <a href="tel:0749742889" class="contact-btn"><i class="fas fa-phone"></i> Appeler</a>
          </div>

          <div class="contact-card">
            <div class="contact-icon">
              <i class="fas fa-ticket-alt"></i>
            </div>
            <h3>Tarifs</h3>
            <p>
              <i class="fas fa-tag"></i> Prévente:
              <span class="highlight">12€</span>
            </p>
            <p>
              <i class="fas fa-tag"></i> Sur place:
              <span class="highlight">15€</span>
            </p>
            <a href="#contact-form" class="contact-btn"><i class="fas fa-ticket-alt"></i> Réserver</a>
          </div>

          <div class="contact-card">
            <div class="contact-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <h3>Adresse</h3>
            <p><i class="fas fa-road"></i> Rue Jean Mermoz</p>
            <p><i class="fas fa-city"></i> 31140 FONBEAUZARD</p>
            <a
              href="https://maps.google.com/?q=Rue+Jean+Mermoz,31140+Fonbeauzard"
              target="_blank"
              class="contact-btn"><i class="fas fa-directions"></i> Itinéraire</a>
          </div>

          <div class="contact-card">
            <div class="contact-icon">
              <i class="fas fa-calendar-alt"></i>
            </div>
            <h3>Date & Heure</h3>
            <p><i class="far fa-calendar-check"></i> 31 Mai 2025</p>
            <p><i class="far fa-clock"></i> 20H - 02H</p>
            <a href="#" class="contact-btn"><i class="fas fa-calendar-plus"></i> Ajouter au calendrier</a>
          </div>
        </div>

        <div class="contact-form" id="contact-form">
          <h3><i class="fas fa-paper-plane"></i> Réservez vos places</h3>
          <form>
            <div class="form-group">
              <label for="name"><i class="fas fa-user"></i> Nom complet</label>
              <input type="text" id="name" required />
            </div>

            <div class="form-group">
              <label for="email"><i class="fas fa-envelope"></i> Email</label>
              <input type="email" id="email" required />
            </div>

            <div class="form-group">
              <label for="phone"><i class="fas fa-phone"></i> Téléphone</label>
              <input type="tel" id="phone" required />
            </div>

            <div class="form-group">
              <label for="tickets"><i class="fas fa-ticket-alt"></i> Nombre de billets</label>
              <div class="ticket-counter">
                <button type="button" class="ticket-btn minus">
                  <i class="fas fa-minus"></i>
                </button>
                <input
                  type="number"
                  id="tickets"
                  min="1"
                  value="1"
                  required />
                <button type="button" class="ticket-btn plus">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>

            <div class="form-group">
              <label for="message"><i class="fas fa-comment"></i> Message (optionnel)</label>
              <textarea id="message" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
              <i class="fas fa-paper-plane"></i> Réserver maintenant
            </button>
          </form>
        </div>
      </div>

      <div class="map">
        <h3><i class="fas fa-map-marked-alt"></i> Plan d'accès</h3>
        <div class="map-container">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2886.6882121532734!2d1.4334!3d43.6667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aea5c1e3c27f27%3A0x3c0b73a0b03c5e21!2sRue%20Jean%20Mermoz%2C%2031140%20Fonbeauzard!5e0!3m2!1sfr!2sfr!4v1621436289712!5m2!1sfr!2sfr"
            width="100%"
            height="300"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"></iframe>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include 'footer.php'; ?>

  <script src="script.js"></script>
</body>

</html>