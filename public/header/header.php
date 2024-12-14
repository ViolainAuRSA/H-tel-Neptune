<header>
        <nav>
            <div class="logo">
                <img src="img/circular_logo.png" alt="Logo Hôtel Le Luxe">
            </div>
            <ul class="nav-links">
                <li><a href="/">Accueil</a></li>
                <li><a href="#chambres">Nos Chambres</a></li>
                <li><a href="#restaurant">Restaurant</a></li>
                <li><a href="#piscine">Piscine & Spa</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if(isset($_SESSION['id'])): ?>
                    <li><a href="logout.php">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="login.php">Connexion</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>