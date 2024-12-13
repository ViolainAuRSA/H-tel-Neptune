<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hôtel Le Luxe - Votre séjour de rêve</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="img/circular_logo.png" alt="Logo Hôtel Le Luxe">
            </div>
            <ul class="nav-links">
                <li><a href="#accueil">Accueil</a></li>
                <li><a href="#chambres">Nos Chambres</a></li>
                <li><a href="#restaurant">Restaurant</a></li>
                <li><a href="#piscine">Piscine & Spa</a></li>
                <li><a href="#contact">Contact</a></li>
                <?php if(isset($_SESSION['user'])): ?>
                    <li><a href="auth.php?logout=1">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="#" class="login-btn">Connexion</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <section id="accueil" class="hero">
            <h1>Bienvenue à l'Hôtel Le Luxe</h1>
            <p>Une expérience unique au cœur de la ville</p>
            <a href="#reservation" class="cta-button">Réserver maintenant</a>
        </section>

        <section id="chambres" class="rooms">
            <h2>Nos Chambres</h2>
            <div class="room-grid">
                <div class="room-card">
                    <img src="img/chambre-standard.jpg" alt="Chambre Standard">
                    <h3>Chambre Standard</h3>
                    <p>À partir de 120€/nuit</p>
                    <a href="#" class="book-btn">Réserver</a>
                </div>
                <div class="room-card">
                    <img src="img/chambre-superieure.jpg" alt="Chambre Supérieure">
                    <h3>Chambre Supérieure</h3>
                    <p>À partir de 180€/nuit</p>
                    <a href="#" class="book-btn">Réserver</a>
                </div>
                <div class="room-card">
                    <img src="img/suite.jpg" alt="Suite">
                    <h3>Suite</h3>
                    <p>À partir de 250€/nuit</p>
                    <a href="#" class="book-btn">Réserver</a>
                </div>
            </div>
        </section>

        <section id="restaurant" class="restaurant">
            <h2>Notre Restaurant</h2>
            <p>Découvrez une cuisine raffinée dans un cadre exceptionnel</p>
            <div class="restaurant-info">
                <div class="hours">
                    <h3>Horaires</h3>
                    <p>Déjeuner: 12h00 - 14h30</p>
                    <p>Dîner: 19h00 - 22h30</p>
                </div>
                <a href="#" class="cta-button">Réserver une table</a>
            </div>
        </section>

        <section id="piscine" class="pool">
            <h2>Piscine & Spa</h2>
            <div class="facilities">
                <div class="facility">
                    <i class="fas fa-swimming-pool"></i>
                    <h3>Piscine chauffée</h3>
                    <p>Ouverte de 7h à 22h</p>
                </div>
                <div class="facility">
                    <i class="fas fa-spa"></i>
                    <h3>Spa</h3>
                    <p>Massages et soins sur rendez-vous</p>
                </div>
            </div>
        </section>

        <section id="contact" class="contact">
            <h2>Contact</h2>
            <div class="contact-container">
                <div class="contact-info">
                    <h3>Nous trouver</h3>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Avenue des Hôtels, 75000 Paris</p>
                    <p><i class="fas fa-phone"></i> +33 1 23 45 67 89</p>
                    <p><i class="fas fa-envelope"></i> contact@hotel-leluxe.fr</p>
                </div>
                <form class="contact-form">
                    <input type="text" placeholder="Nom" required>
                    <input type="email" placeholder="Email" required>
                    <textarea placeholder="Message" required></textarea>
                    <button type="submit" class="cta-button">Envoyer</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>Hôtel Le Luxe</h4>
                <p>123 Avenue des Hôtels</p>
                <p>75000 Paris, France</p>
            </div>
            <div class="footer-section">
                <h4>Contact</h4>
                <p>Tél: +33 1 23 45 67 89</p>
                <p>Email: contact@hotel-leluxe.fr</p>
            </div>
            <div class="footer-section">
                <h4>Suivez-nous</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Hôtel Le Luxe. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>
