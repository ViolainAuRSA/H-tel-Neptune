<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Accueil</title>

    <meta name="description" content="Bienvenue à l'Hôtel Neptune - Profitez d'un séjour inoubliable au bord de la mer avec des chambres confortables et un service exceptionnel.">
    <meta name="keywords" content="hôtel, Neptune, réservation, chambres, bord de mer, séjour, vacances, hôtel luxe">
    <meta name="author" content="Hôtel Neptune">
    <meta property="og:title" content="Hôtel Neptune - Séjour au bord de la mer">
    <meta property="og:description" content="Découvrez l'Hôtel Neptune et réservez votre chambre pour un séjour inoubliable.">
    <meta property="og:image" content="images/hotel-neptune.jpg">
    <meta property="og:url" content="http://www.hotelneptune.com">
    <meta name="twitter:card" content="summary_large_image">
    <title>Hôtel Neptune - Accueil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php if(isset($_SESSION['user'])): ?>
        <div class="user-info">
            <h3>Informations de l'utilisateur :</h3>
            <p>Nom : <?php echo $_SESSION['user']['nom']; ?></p>
            <p>Prénom : <?php echo $_SESSION['user']['prenom']; ?></p>
            <p>Email : <?php echo $_SESSION['user']['email']; ?></p>
        </div>
    <?php endif; ?>

    <p><a href="Register.php">S'inscrire</a></p>
</body>

<header>
    <div class="container">
        <div class="logo-container">
            <div class="logo"><img src="img/circular_logo.png" alt="logo_hotel_neptune"></div>
        </div>
        <h1>Hôtel Neptune</h1>
        <nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="#chambres">Nos Chambres</a></li>
                <li><a href="#services">Nos Services</a>
                    <ul>
                        <li><a href="#spa">Spa</a></li>
                        <li><a href="#activites">Activités</a></li>
                    </ul>
                </li>
                <li><a href="reservation.php">Réservation</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>


    <main>
        <section class="hero">
            <h2>Un séjour de rêve au bord de la mer</h2>
            <p>Réservez votre séjour dès maintenant et profitez de nos chambres confortables, de notre piscine et de notre vue imprenable.</p>
            <a href="reservation.php" class="btn">Réserver maintenant</a>
        </section>

        <section class="features">
            <h2>Nos points forts</h2>
            <div class="feature-container">
                <div class="feature-item">
                    <img src="images/room.jpg" alt="Chambre luxueuse">
                    <h3>Chambres luxueuses</h3>
                    <p>Des chambres spacieuses et confortables adaptées à tous vos besoins.</p>
                </div>
                <div class="feature-item">
                    <img src="images/pool.jpg" alt="Piscine de l'hôtel">
                    <h3>Piscine extérieure</h3>
                    <p>Une piscine avec vue panoramique sur la mer pour un moment de détente.</p>
                </div>
                <div class="feature-item">
                    <img src="images/restaurant.jpg" alt="Restaurant gastronomique">
                    <h3>Restaurant gastronomique</h3>
                    <p>Des plats raffinés préparés avec des produits locaux et de saison.</p>
                </div>
            </div>
        </section>

        <section class="testimonials">
            <h2>Ce que disent nos clients</h2>
            <blockquote>
                "Un séjour inoubliable à l'Hôtel Neptune. Le personnel est aux petits soins, et la vue est incroyable !" - Marie D.
            </blockquote>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Hôtel Neptune</h4>
                    <p>123 Avenue de la Mer<br>
                    34000 Montpellier<br>
                    France</p>
                    <p>Tél : +33 4 67 XX XX XX</p>
                </div>
                
                <div class="footer-section">
                    <h4>Liens rapides</h4>
                    <ul>
                        <li><a href="#accueil">Accueil</a></li>
                        <li><a href="#chambres">Nos Chambres</a></li>
                        <li><a href="#services">Nos Services</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Suivez-nous</h4>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                    <a href="https://celianmartin.fr" class="portfolio-btn" target="_blank" rel="noopener">
                        Visiter celianmartin.fr
                    </a>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2024 Hôtel Neptune. Tous droits réservés.</p>
                <p><a href="mentions-legales.php">Mentions légales</a> | <a href="politique-confidentialite.php">Politique de confidentialité</a></p>
            </div>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/VOTRE_CODE_KIT.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
