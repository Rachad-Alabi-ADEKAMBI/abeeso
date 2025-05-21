<nav class="navbar">
    <div class="container">
        <div class="logo"><i class="fas fa-drum"></i> ABEESO</div>
        <ul class="nav-links">
            <li>
                <a href="index.php" class="active"><i class="fas fa-home"></i> Accueil</a>
            </li>
            <li>
                <a href="index.php#a-propos"><i class="fas fa-info-circle"></i> À propos</a>
            </li>
            <li>
                <a href="index.php#menu"><i class="fas fa-utensils"></i> Menu</a>
            </li>
            <li>
                <a href="index.php#contact"><i class="fas fa-envelope"></i> Contact</a>
            </li>

            <?php

            if (isset($_SESSION['user'])) { ?>
                <li><a href="dashboard.php"><i class="fas fa-table-columns"></i>Tableau de bord</a></li>
                <li><a href="api/api.php?action=logout"><i class="fas fa-sign-out-alt"></i>
                        Déconnexion</a></li>
            <?php } else { ?>
                <li>
                    <a href="login.php"><i class="fas fa-sign-in-alt"></i>
                        Connexion</a>
                </li>
            <?php }

            ?>
        </ul>


        </ul>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>