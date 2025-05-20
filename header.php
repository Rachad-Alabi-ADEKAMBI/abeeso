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
            /*
            if (isset($_SESSION['user'])) { ?>
                <li><a href="dashboard.php"><i class="fas fa-chart-line"></i>Tableau de bord</a></li>
                <li><a href="api/script.php?action=logout"><i class="fas fa-left-to-bracke"></i> Déconnexion</a></li>
            <?php } else { ?>
                <li>
                    <a href="login.php"><i class="fas fa-angle-right"></i> Connexion</a>
                </li>
            <?php } 
            
            */ ?>

            <li><a href="dashboard.php"><i class="fas fa-table-columns"></i>Tableau de bord</a></li>
            <li>
                <a href="login.php"><i class="fas fa-right-to-bracket"></i> Connexion</a>
            </li>

        </ul>


        </ul>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>